<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Files;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
   
    public function index()
    {
        $title = 'Cours';
        $groupeList = Group::all();
        $courses = Course::paginate(10);
        $firstCourse = Course::first();
        $courseid = $firstCourse ? $firstCourse->id : null;
        
        return view('courses.index', compact('title', 'courses', 'groupeList', 'courseid'));
    }
    
    

   public function create()
   {
       $title = "Ajout de cours";
       $groups = Group::all();

       return view('courses.create', compact('title'));
   }

   public function store(Request $request)
   {
       $this->validate($request, [
           'name' => 'required|min:3',
           'content' => 'required',
           'group_id' => 'required'
       ]);
   
       $course = Course::create([
           'name' => $request->name,
           'content' => $request->content,
           'user_id' => auth()->id(),
           'group_id' => $request->group_id
       ]);
   
       // Save files also and create an entry
       if($request->hasFile('files')) {
           foreach($request->file('files') as $file) {
               $path = $file->store('courses', 'public');                
               $course->files()->create([
                   'file' => $path,
                   'course_id' => $course->id,
                   'user_id' => auth()->id()
               ]);
           }
       }
   
       return redirect()->route('dashboard.courses.index')->with('success', 'Le cours a été créé');
   }
   
   public function update(Request $request, $id)
   {
       $this->validate($request, [
           'name' => 'required|min:3',
           'content' => 'required|min:10'
       ]);
   
       $course = Course::findOrFail($id);
   
       $course->update([
           'name' => $request->name,
           'content' => $request->content,
           'user_id' => auth()->id()
       ]);
   
       // Save files also and create an entry
       if($request->hasFile('files')) {
           Files::whereIn('course_id', [$id])->delete();
   
           foreach($request->file('files') as $file) {
               $path = $file->store('courses', 'public');               
               $course->files()->create([
                   'file' => $path,
                   'course_id' => $course->id,
                   'user_id' => auth()->id()
               ]);
           }
       }
   
       return redirect()->route('dashboard.courses.index')->with('success', 'Le cours a été modifié');
   }
   

   public function show($id)
   {
       $title = "Détails du Cours";
       $course = Course::findOrFail($id);

       return view('dashboard.courses.show', compact('course', 'title'));
   }

   public function edit($id)
   {
       $title = "Modification du cours";
       $groups = Group::all();
       $course = Course::findOrFail($id);

       return view('dashboard.courses.edit', compact('course', 'title', 'groups'));
   }

//    public function update(Request $request, $id)
//    {
//         $this->validate($request, [
//            'name' => 'required|min:3',
//            'content' => 'required|min:10'
//        ]);

//        $course = Course::findOrFail($id);

//        $course->update([
//            'name' => $request->name,
//            'content' => $request->content,
//            'user_id' => auth()->id()
//        ]);

//        // Save files also and create an entry
//        if ($request->hasFile('files')) {
//            Files::where('course_id', $id)->delete();

//            foreach ($request->file('files') as $file) {
//                $path = $file->store('courses', 'public');
//                $course->files()->create([
//                    'file' => $path,
//                    'course_id' => $course->id,
//                    'user_id' => auth()->id()
//                ]);
//            }
//        }

//        return redirect()->route('dashboard.courses.index')->with('success', 'Le cours a été modifié');
//    }

   public function destroy($id)
   {
       $course = Course::findOrFail($id);
       $course->delete();
       Files::where('course_id', $id)->delete();

       return redirect()->route('dashboard.courses.index')->with('success', 'Le cours a été supprimé');
   }

   // Supprimer Sélectionné
   public function deleteSelected(Request $request)
   {
       $ids = $request->ids;
       Course::whereIn('id', explode(",", $ids))->delete();
       Files::whereIn('course_id', explode(",", $ids))->delete();

       return redirect()->route('dashboard.courses.index')->with('success', 'Les cours ont été supprimés');
   }

   // Rechercher
   public function search(Request $request)
   {
       $title = 'Cours';
       $search = $request->get('search');
       $courses = Course::where('name', 'like', '%' . $search . '%')->paginate(10);
       return view('dashboard.courses.index', compact('title', 'courses'));
   }

   public function apiIndex()
{
    $courses = Course::all();
    return response()->json(['data' => $courses]);
}

public function apiShow($id)
{
    $courses = Course::find($id);

    if (!$courses) {
        return response()->json(['message' => 'Cours non trouvé'], 404);
    }

    return response()->json(['data' => $courses]);
}

}

