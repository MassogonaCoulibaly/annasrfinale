<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!--<link rel="shortcut icon" href="../images/favicon.png" type="image/png">-->

  <title>{{ env('APP_NAME')}}</title>

  <link rel="stylesheet" href="{{ asset('/asset/css/font-awesome.css') }}">

  <link rel="stylesheet" href="{{ asset('/asset/css/quirk.css') }}">
  <link rel="stylesheet" href="{{ asset('/asset/css/dataTables.bootstrap.css') }}">

  <script src="{{ asset('/asset/css/modernizr.css') }}"></script>

</head>

@yield('content')
</html>