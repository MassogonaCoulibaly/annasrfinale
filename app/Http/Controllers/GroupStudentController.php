<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupStudentController extends Controller
{
    public function index(){
        $title = 'Groupes';
        $groups = Group::paginate(10);
        return view('groupes.index', compact('title', 'groups'));
    }

    public function show($id){
        $title = 'Details du gGroupe';
        $group = Group::findOrFail($id);
        return view('groupes.show', compact('title', 'group'));
    }

    public function create(){
        $title = 'Ajouter un groupe';
        return view('groupes.create', compact('title'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
        ]);

        $group = new Group();
        $group->name = $request->name;
        $group->description = $request->description;
        $group->save();

        return redirect()->route('dashboard.groupes.index')->with('success', 'Groupe ajouté avec succès');
    }

    public function edit($id){
        $title = 'Modifier un groupe';
        $group = Group::findOrFail($id);
        return view('groupes.edit', compact('title', 'group'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
        ]);

        $group = Group::findOrFail($id);
        $group->name = $request->name;
        $group->description = $request->description;
        $group->save();

        return redirect()->route('groupes.index')->with('success', 'Groupe modifié avec succès');
    }

    public function destroy($id){
        $group = Group::findOrFail($id);
        $group->delete();
        $group->students()->detach();

        return redirect()->route('groupes.index')->with('success', 'Groupe supprimé avec succès');
    }

    public function search(Request $request){
        $title = 'Groupes';
        $search = $request->get('search');
        $groups = Group::where('name', 'like', '%'.$search.'%')->paginate(10);
        return view('groupes.index', compact('title', 'groups'));
    }

    public function deleteBySelection(Request $request){
        $ids = $request->ids;
        Group::whereIn('id', explode(",", $ids))->delete();

        // detach students
        $groups = Group::whereIn('id', explode(",", $ids))->get();
        foreach($groups as $group){
            $group->students()->detach();
        }

        return response()->json(['success'=>"Groupes supprimés avec succès."]);
    }
}
