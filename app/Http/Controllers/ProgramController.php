<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exercise;
use App\Models\Group;
use App\Models\Level;
use App\Models\Program;
use Illuminate\Http\Request;


class ProgramController extends Controller
{
    
    
    public function index()
    {
        
        $title = 'Programmes';
        $programs = Program::paginate(10);
        $firstProgram = Program::first();
        $programid = $firstProgram ? $firstProgram->id : null;
        $courses = Course::all();
        $exercises = Exercise::all();
        $levels = Level::all();
        $name = null; 
        $start_date = null; 
        $course_id = null; 
        $level_id = null;
        $numberOfPrograms = Program::count();

        return view('programs.index', compact('title', 'programs', 'courses', 'exercises', 'levels', 'name', 'start_date', 'course_id', 'level_id', 'numberOfPrograms'));
    }


    public function create()
    {
        $title = 'Ajouter un programme';
        $courses = Course::all();
        $exercises = Exercise::all();
        $groups = Group::all();
    
        return view('programs.create', compact('title', 'courses', 'exercises', 'groups'));
    }
    

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'start_date' => 'required|date',
            'course_id' => 'required', 
            'level_id' => 'required', 
        ]);

        $name = $request->input('name');
        $start_date = $request->input('start_date');
        $course_id = $request->input('course_id');
        $level_id = $request->input('level_id');

        $start_time = $request->input('start_time');
        Program::create([
            'name' => $name,
            'start_date' => $start_date,
            'start_time' => $start_time,
            'course_id' => $course_id,
            'level_id' => $level_id,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('dashboard.programs.index')->with('success', 'Le programme a été créé')->withInput();
    }

    public function show($id)
    {
        return view('programs.show');
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        $courses = Course::all();
        $exercises = Exercise::all();
        $groups = Group::all();
    
        return view('programs.edit', compact('program', 'courses', 'exercises', 'groups'));
    }

    public function update(Request $request, $id)
{
    $this->validate($request, [
        'name' => 'required|min:3',
        'start_date' => 'required|date',
        'course_id' => 'required', 
        'level_id' => 'required',
    ]);

    $program = Program::findOrFail($id);

    $program->update([
        'name' => $request->name,
        'start_date' => $request->start_date,
        'course_id' => $request->course_id,
        'level_id' => $request->level_id,
        'user_id' => auth()->id()
    ]);

    return redirect()->route('dashboard.programs.index')->with('success', 'Le programme a été modifié');
}


public function destroy($id)
{
    $program = Program::findOrFail($id);
    $program->delete();

    return redirect()->route('dashboard.programs.index')->with('success', 'Le programme a été supprimé');
}


    public function deleteSelected(Request $request){
       
        $ids = $request->ids;
        Program::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Les programmes ont été supprimés."]);
    }

    public function search(Request $request){
        $title = 'Programmes';
        $search = $request->get('search');
        $programs = Program::where('name', 'like', '%'.$search.'%')->paginate(10);
        return view('programs.index', compact('title', 'programs'));
    }

    public function apiIndex()
{
    $programs = Program::all();
    return response()->json(['data' => $programs]);
}
public function apiShow($id)
{
    $programs = Program::find($id);

    if (!$programs) {
        return response()->json(['message' => 'Exercice non trouvé'], 404);
    }

    return response()->json(['data' => $programs]);
}

}
