<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use App\Models\Group;
use App\Models\Level;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $groupeList = Group::all();
        $levelList = Level::all();
        $title = 'Liste des élèves';
        $students = Student::paginate(10);
        $id = $students->first()->id ?? null; // Récupérer l'ID du premier étudiant ou null s'il n'y en a pas
        return view('students.index', compact('title', 'students', 'groupeList', 'id', 'levelList'));
    }

    public function create()
    {
        $title = "Ajout d'un étudiant";
        $groupeList = Group::all();
        $levelList = Level::all(); // Ajout de la liste des niveaux
        return view('students.create', compact('title', 'groupeList', 'levelList'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:3',
            'phone' => 'required',
            'group_id' => 'required',
            'level_id' => 'required', // Validation du niveau
        ]);

        Student::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'group_id' => $request->group_id,
            'level_id' => $request->level_id,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('dashboard.students.index')->with('success', 'L\'étudiant a été créé');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:3',
            'phone' => 'required',
            'group_id' => 'required',
            'level_id' => 'required',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->only(['firstname', 'lastname', 'phone', 'group_id', 'level_id']));

        return redirect()->route('dashboard.students.index')->with('success', 'L\'étudiant a été modifié');
    }

    public function show($id)
    {
        $title = "Détails de l'étudiant";
        $student = Student::findOrFail($id);
        return view('students.show', compact('title', 'student'));
    }

    public function edit($id)
    {
        $title = "Modification de l'étudiant";
        $student = Student::findOrFail($id);
        $groupeList = Group::all();
        $levelList = Level::all(); // Ajout de la liste des niveaux
        return view('students.edit', compact('title', 'student', 'groupeList', 'levelList'));
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('dashboard.students.index')->with('success', 'L\'étudiant a été supprimé');
    }

    public function deleteBySelection(Request $request)
    {
        $ids = $request->ids;
        Student::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Étudiants supprimés avec succès."]);
    }

    public function import(Request $request)
    {
        if (!$request->hasFile('file')) {
            return back()->with('error', 'Aucun fichier fourni.');
        }

        $file = $request->file('file');
        $csvData = file_get_contents($file);
        $lines = explode(PHP_EOL, $csvData);
        $header = str_getcsv(array_shift($lines));

        // Get the group ID and level ID from the request
        $groupId = $request->input('group_id');
        $levelId = $request->input('level_id');

        foreach ($lines as $line) {
            $data = str_getcsv($line);
            if (count($data) >= 4) {
                Student::create([
                    'firstname' => $data[0],
                    'lastname' => $data[1],
                    'phone' => $data[2],
                    'group_id' => $groupId,
                    'level_id' => $levelId,
                    'user_id' => Auth::id()
                ]);
            }
        }

        return back()->with('success', 'Les élèves ont été importés avec succès.');
    }
}

