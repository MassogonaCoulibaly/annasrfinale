@extends('layouts.navbar')

@section('content')
<div class="panel">
 <div class="panel-heading">
 <h3>Ajouter un programme</h3>
 </div>
 <div class="panel-body">
 <form action="{{ route('dashboard.programs.store') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="programName">Nom du programme</label>
    <input type="text" class="form-control" id="programName" name="name" placeholder="Nom du programme" required>
  </div>
  <div class="form-group">
    <label for="programStartDate">Date de début</label>
    <input type="date" class="form-control" id="programStartDate" name="start_date" required>
  </div>
  <!-- Ajouter d'autres champs si nécessaire -->
  <button type="submit" class="btn btn-primary">Enregistrer</button>
 </form>
 </div>
</div>
@endsection
