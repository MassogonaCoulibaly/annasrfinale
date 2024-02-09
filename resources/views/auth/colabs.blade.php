@extends('layouts.navbar')

@section('content')
<div class="panel">
 <div class="panel-heading">
   <h3>Ajouter un étudiant</h3>
 </div>
 <div class="panel-body">
   <form action="{{ route('dashboard.students.store') }}" method="POST">
     @csrf
     <div class="form-group">
       <label for="studentLastName">Nom</label>
       <input type="text" class="form-control" id="studentLastName" name="lastname" required>
     </div>
     <div class="form-group">
       <label for="studentFirstName">Prénom</label>
       <input type="text" class="form-control" id="studentFirstName" name="firstname" required>
     </div>
     <div class="form-group">
       <label for="studentPhone">Téléphone</label>
       <input type="text" class="form-control" id="studentPhone" name="phone" required>
     </div>
     <div class="form-group">
      <label for="studentGroup">Groupe</label>
      <select class="form-control" id="studentGroup" name="group_id" required>
          @foreach ($groupeList as $groupe)
              <option value="{{ $groupe->id }}">{{ $groupe->name }}</option>
          @endforeach
      </select>
   </div>
   
     <!-- Autres champs nécessaires pour l'étudiant -->
     <button type="submit" class="btn btn-primary">Enregistrer</button>
   </form>
 </div>
</div>
@endsection
