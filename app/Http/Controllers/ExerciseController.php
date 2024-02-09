<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Files;
use App\Models\Exercise;
use Illuminate\Http\Request;
use logHistory;

class ExerciseController extends Controller
{
    public function index(){
        $title = 'Exercises';
        $courseList = Course::all();
        $exercises = Exercise::paginate(10);
        $firstExercise = Exercise::first();
        $exerciseid = $firstExercise ? $firstExercise->id : null;
    
        // Vérifiez si $exercises est null ou vide avant de l'utiliser
        if ($exercises !== null && $exercises->count() > 0) {
            // Initialisation de $programs avec les données nécessaires
            $programs = $exercises;
        } else {
            // Initialisation de $programs avec une valeur par défaut si nécessaire
            $programs = [];
        }
    
        return view('exercises.index', compact('title', 'exercises', 'courseList', 'exerciseid'));
     }
    

        public function create(){

            $title = "Ajout d'exercise";
            return view('exercises.create', compact('title'));
        }

        public function store(Request $request){
            $this->validate($request, [
                'title' => 'required|min:3',
                'content' => 'required',
                'course_id' => 'required'
            ]);
            // dd($request);

            $exo = Exercise::create([
                'name' => $request->title,
                'content' => $request->content,
                'user_id' => auth()->id(),
                'course_id' => $request->course_id
            ]);
            // Save files also and create an entry
            if($request->hasFile('files')) {
                foreach($request->file('files') as $file) {
                    $route = 'exercises/' . time() . '.' . $file->getClientOriginalExtension();
                    $path = $file->move(public_path('exercises/'), $route);   
                    $exo->files()->create([
                       'file' => $route,
                       'exercise_id' => $exo->id,
                       'user_id' => auth()->id()
                    ]);
                }
            }

            return redirect()->route('dashboard.exercises.index')->with('success', 'L\'exercice a été créé');
        }

        public function show($id){

            $title = "Details de l'exercise";
            $exercise = Exercise::findOrFail($id);

            return view('exercises.show', compact('title', 'exercise'));
        }

        public function edit($id){

            $title = "Modification de l'exercise";
            $exercise = Exercise::findOrFail($id);

            return view('exercises.edit', compact('title', 'exercise'));
        }

        public function update(Request $request, $id){
            $this->validate($request, [
                'name' => 'required|min:3',
                'content' => 'required|min:10',
                'course_id' => 'required',
            ]);
        
            $exercise = Exercise::findOrFail($id);
        
            $exercise->update([
                'name' => $request->name,
                'content' => $request->content,
                'user_id' => auth()->id(),
                'course_id' => $request->course_id,
            ]);
        
            // save files and add them to database
            if($request->hasFile('files')) {
                Files::whereIn('exercise_id', $id)->delete();
        
                foreach($request->file('files') as $file) {
                    $path = $file->store('exercices', 'public');                
                    $exercise->files()->create([
                        'file' => $path,
                        'exercise_id' => $exercise->id,
                        'user_id' => auth()->id()
                    ]);
                }
            }
        
            return redirect()->route('dashboard.exercises.index')->with('success', 'L\'exercice a été modifié');
        }
        

        public function destroy($id){
            $exercise = Exercise::findOrFail($id);
        
            // Delete related files
            $exercise->files()->delete();
        
            // Dissociate related course
            $exercise->course()->dissociate();
        
            // Delete the exercise
            $exercise->delete();
        
            return redirect()->route('dashboard.exercises.index')->with('success', 'L\'exercice a été supprimé');
        }
        
        

        public function deleteSelected(Request $request){
           
            $ids = $request->ids;
            Exercise::whereIn('id',explode(",",$ids))->delete();
            Files::whereIn('exercise_id',explode(",",$ids))->delete();

            return redirect()->route('exercises.index')->with('success', 'Les exercices ont été supprimés');
        }

        public function assign(Request $request, $id){
            $title = "Assigner un exercice";
            $class = $request->class;
            $exercise = Exercise::findOrFail($id);
            $courses = Exercise::where();

            return view('exercises.assign', compact('title', 'exercise', 'courses'));
        }

        public function apiIndex()
{
    $exercises = Exercise::all();
    return response()->json(['data' => $exercises]);
}

public function apiShow($id)
{
    $exercises = Exercise::find($id);

    if (!$exercises) {
        return response()->json(['message' => 'Exercice non trouvé'], 404);
    }

    return response()->json(['data' => $exercises]);
}


}
