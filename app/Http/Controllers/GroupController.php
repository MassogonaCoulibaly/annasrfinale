<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use App\Models\File;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GroupController extends Controller
{
    public function create()
    {
        $title = "Ajout de groupe";
        $groups = Group::all();
        $levels = Level::all(); 
        return view('groups.create', compact('title', 'groups', 'levels'));
    }
   
    public function index()
    {
        $title = 'Groupes';
        $groups = Group::paginate(10);
        return view('groups.index', compact('title', 'groups'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'content' => 'required',
        ]);

        $group = Group::create([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'user_id' => auth()->id(),
        ]);

        if ($request->filled('levels')) {
            $group->levels()->attach($request->input('levels'));
        }

        return redirect()->route('dashboard.groups.index')->with('success', 'Le groupe a été créé');
    }
    

    public function show($id){

        $title = "Details du groupe";
        $group = Group::findOrFail($id);

        return view('groups.show', compact('title', 'group'));
    }

    public function edit($id){

        $title = "Modification du groupe";
        $group = Group::findOrFail($id);

        return view('groups.edit', compact('title', 'group'));
    }

    public function update(Request $request, $id){

        $group = Group::findOrFail($id);

        $group->update([
            'name' => $request->name, 
            'content' => $request->content,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('dashboard.groups.index')->with('success', 'Le groupe a été modifié');
    }

    public function destroy($id){
        $group = Group::findOrFail($id);

        $group->delete();

        return redirect()->route('dashboard.groups.index')->with('success', 'Le groupe a été supprimé');
    }

    public function deleteBySelection(Request $request) {
        $ids = $request->ids;
        Group::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success'=>"Les groupes ont été supprimés."]);
    }

    public function syncFromWhatsapp(Request $request) {

        $response = makeApiCall('groups');

        $groups = json_decode($response->data);
        foreach($groups as $group) {

            if(Group::where('name', $group->name)->exists()) {
                continue;
            }

            Group::create([
                'name' => $group->name,
                'content' => $group->content,
                'user_id' => auth()->id()
            ]);

            foreach ($group->students as $student){
                $student = Student::create([
                    'lastname' => $student->name,
                    'phone' => $student->phone,
                    'user_id' => auth()->id()
                ]);

                $student->groups()->attach($group->id);
            }

        }

        return redirect()->route('groups.index')->with('success', 'Les groupes ont été synchronisés.');
    }

    public function apiIndex()
{
    $groups = Group::all();
    return response()->json(['data' => $groups]);
}
public function apiShow($id)
{
    $groups = Group::find($id);

    if (!$groups) {
        return response()->json(['message' => 'Exercice non trouvé'], 404);
    }

    return response()->json(['data' => $groups]);
}

}
