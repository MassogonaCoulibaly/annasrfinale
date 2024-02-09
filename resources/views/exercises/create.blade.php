@extends('layouts.navbar')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-sm-8 ml-auto">
            {{-- <div class="panel">
                <div class="panel-heading">
                    <h4 class="panel-title">Input Fields</h4>
                    <p>Individual form controls automatically receive some global styling with
                        <code>.form-control</code> class that are set to 100% width by default.</p>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <input type="text" placeholder="Help Text" class="form-control">
                        <span class="help-block">A block of help text that breaks onto a new line and may extend beyond
                            one line.</span>
                    </div>

                    <div class="form-group">
                        <input type="text" placeholder="Help Text" class="form-control">
                        <span class="help-block">A block of help text that breaks onto a new line and may extend beyond
                            one line.</span>
                    </div>

                    <div class="form-group">
                        <input type="text" placeholder="Help Text" class="form-control">
                        <span class="help-block">A block of help text that breaks onto a new line and may extend beyond
                            one line.</span>
                    </div>
                </div>
            </div><!-- panel --> --}}
            <title>Formulaire d'enregistrement de cours</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                }
        
                .form-container {
                    background-color: white;
                    width: 300px;
                    padding: 20px;
                    margin: 50px auto;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
        
                form {
                    display: flex;
                    flex-direction: column;
                }
        
                form h2 {
                    text-align: center;
                }
        
                form label {
                    margin-bottom: 5px;
                    font-weight: bold;
                }
        
                form input[type="text"],
                form textarea,
                form input[type="file"] {
                    margin-bottom: 20px;
                    padding: 10px;
                    border: 1px solid #ddd;
                    border-radius: 5px;
                }
        
                form input[type="submit"] {
                    background-color: #007bff;
                    color: white;
                    padding: 10px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }
        
                form input[type="submit"]:hover {
                    background-color: #0056b3;
                }
            </style>
        </head>
        <body>
            <div class="form-container">
                <form action="/submit-course" method="post" enctype="multipart/form-data">
                    <h2>Enregistrement de Cours</h2>
                    
                    <label for="courseName">Nom du cours:</label>
                    <input type="text" id="courseName" name="courseName" required>
        
                    <label for="courseDescription">Description:</label>
                    <textarea id="courseDescription" name="courseDescription" required></textarea>
        
                    <label for="courseAudio">Fichier Audio:</label>
                    <input type="file" id="courseAudio" name="courseAudio" accept="audio/*">
        
                    <label for="coursePhoto">Photo du Cours:</label>
                    <input type="file" id="coursePhoto" name="coursePhoto" accept="image/*">
        
                    <input type="submit" value="Enregistrer le cours">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection