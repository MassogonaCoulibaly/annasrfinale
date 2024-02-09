<?php 

    function agent()
    {
        return $_SERVER['HTTP_USER_AGENT'];
    }

    function ip()
    {
        return $_SERVER['REMOTE_ADDR'];
    }

    function mac($interface = null)
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $output = exec('getmac');
        } else {
            if ($interface === null) {
                $interface = exec("ip route | grep default | awk '{print $5}'");
            }

            $output = shell_exec("ifconfig $interface 2>&1 | grep 'ether' | awk '{print $2}'");
        }

        if ($output) {
            $macAddresses = explode("\n", trim($output));
            $macAddress = $macAddresses[0];
            return $macAddress;
        } else {
            return false;
        }
    }

if (!function_exists('logHistory')) {
    function logHistory( $link, $name, $description ) {
        \App\Models\History::create([
            'link' => $link,
            'user_id' => auth()->user()->id,
            'ip_address' => ip(),
            'mac_address' => mac() ,
            'agent' =>  agent(),
            'name' => $name,
            'description' => $description,
        ]);
    }
}

function makeApiCall($resource)
{
    $response = Illuminate\Support\Facades\Http::timeout(90)->withHeaders([
        'Authorization' => 'Bearer YOUR_ACCESS_TOKEN',
        ])->get('https://whatsapp.icoran.net/api/'. $resource . '/');

    if ($response->successful()) {
        $data = $response->json();
        return $data;
    } else {
        $statusCode = $response->status();
        $error = $response->json();
        return response()->json(['error' => $error], $statusCode);
    }
}

?>
