<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    
    public function index()
    {
        $title = 'Documents';
        return view('files.index', compact('title'));
    }

    public function create()
    {
        return view('files.create');
    }

    public function store(Request $request)
    {
        // Store file in storage/app/public/files

        $path = $request->file('file')->store('files', 'public');

        // Save file to database
        Files::create([
            'file' => $path,
            'course_id' => $request->course_id,
            'exercise_id' => $request->exercise_id
        ]);

    }

    public function show($id)
    {
        return view('files.show');
    }

    public function edit($id)
    {
        return view('files.edit');
    }

    public function update(Request $request, $id)
    {
            // Find file and replace it with the new file
            $path = $request->file('file')->store('files', 'public');

    
            $file = Files::findOrFail($id);
    
            $file->update([
                'name' => $request->title,
                'content' => $request->content,
                'user_id' => auth()->id()
            ]);
    
            return redirect()->route('files.index')->with('success', 'Le fichier a été modifié');
    }

    public function destroy($id)
    {
        $file = Files::findOrFail($id);

        $file->delete();

        return redirect()->route('files.index')->with('success', 'Le fichier a été supprimé');
    }

}
