@extends('layouts.navbar')

@section('content')
<div class="panel">
 <div class="panel-heading">
  <h3>Ajouter un cours</h3>
 </div>
 <div class="panel-body">
  <form action="{{ route('dashboard.courses.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="courseName">Nom du cours</label>
      <input type="text" class="form-control" id="courseName" name="name" required>
    </div>
    <div class="form-group">
      <label for="courseContent">Contenu du cours</label>
      <textarea class="form-control" id="courseContent" name="content" rows="3" required></textarea>
    </div>
    <div class="form-group">
      <label for="courseFiles">Fichiers du cours</label>
      <input type="file" class="form-control-file" id="courseFiles" name="files[]" multiple>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
  </form>
 </div>
</div>
@endsection
