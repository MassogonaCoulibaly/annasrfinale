@extends('layouts.navbar')

@section('content')
<div class="panel">
  <div class="panel-heading">
    <button class="btn btn-primary" data-toggle="modal" data-target="#addSecretaryModal">
      Ajouter un secrétaire
    </button>

    <!-- Formulaire d'Importation CSV -->
    <form action="{{ route('dashboard.secretaries.import') }}" method="POST" enctype="multipart/form-data" style="display: inline;">
      @csrf
      <input type="file" name="file" required>
      <button type="submit" class="btn btn-secondary">Importer CSV</button>
    </form>
  </div>

  <div class="panel-body">
    <div class="table-responsive">
      <table id="dataTable1" class="table table-bordered table-primary table-striped-col dataTable" role="grid">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($secretaries as $secretary)
            <tr>
              <td>{{ $secretary->lastname }}</td>
              <td>{{ $secretary->firstname }}</td>
              <td>{{ $secretary->email }}</td>
              <td>
                <a href="{{ route('dashboard.secretaries.edit', $secretary->id) }}" class="btn btn-primary">Modifier</a>
                <form action="{{ route('dashboard.secretaries.destroy', $secretary->id) }}" method="POST" style="display: inline;">
                 @csrf
                 @method('DELETE')
                 <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
 

<!-- Modal pour Ajouter un Secrétaire -->
<div class="modal fade" id="addSecretaryModal" tabindex="-1" role="dialog" aria-labelledby="addSecretaryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="addSecretaryModalLabel">Ajouter un Nouveau Secrétaire</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route('dashboard.secretaries.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="secretaryLastName">Nom</label>
            <input type="text" class="form-control" id="secretaryLastName" name="lastname" required>
          </div>
          <div class="form-group">
            <label for="secretaryFirstName">Prénom</label>
            <input type="text" class="form-control" id="secretaryFirstName" name="firstname" required>
          </div>
          <div class="form-group">
            <label for="secretaryEmail">Email</label>
            <input type="email" class="form-control" id="secretaryEmail" name="email" required>
          </div>
          
          <!-- Autres champs nécessaires pour le secrétaire -->
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
@endsection
