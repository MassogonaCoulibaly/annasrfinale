<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Http\Requests\StoreLevelRequest; // Assurez-vous que ce Request est correctement défini
use App\Http\Requests\UpdateLevelRequest; // Assurez-vous que ce Request est correctement défini
use App\Models\Group;
use Illuminate\Http\Request;

class LevelController extends Controller
{

    public function create()
    {
        $title = "Ajout de niveau";
        $groups = Group::all();
        return view('levels.create', compact('title', 'groups')); 
    }

    public function index()
    {
        $groups = Group::paginate(10); 
        $levels = Level::with('group')->paginate(10); 
        return view('levels.index', compact('groups', 'levels')); 
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:3',
            'description' => 'required|string',
            'group_id' => 'required',
        ]);
         Level::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'group_id' => $request->group_id,
        ]);
    
        return redirect()->route('dashboard.levels.index')->with('success', 'Le niveau a été créé avec succès.'); // Correction du nom de la route
    }

    public function show(Level $level)
    {
        return view('levels.show', compact('level'));
    }

    public function edit(Level $level)
    {
        return view('levels.edit', compact('level')); // Correction du chemin de la vue
    }

    public function update(Request $request, Level $level)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'required|string',
            'group_id' => 'required|exists:groups,id',
        ]);

        $level->update($validatedData);

        return redirect()->route('dashboard.levels.index')->with('success', 'Le niveau a été mis à jour avec succès.'); // Correction du nom de la route
    }

    public function destroy(Level $level)
    {
        $level->delete();
        return redirect()->route('dashboard.levels.index')->with('success', 'Le niveau a été supprimé avec succès.'); // Correction du nom de la route
    }
}
