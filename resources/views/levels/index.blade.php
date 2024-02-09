@extends('layouts.navbar')

@section('content')
<div class="panel">
  <div class="panel-heading">
    <button class="btn btn-primary" data-toggle="modal" data-target="#addLevelModal">
      Ajouter un niveau
    </button>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-bordered table-primary table-striped-col" role="grid">
        <thead>
          <tr>
            <th>Nom du Niveau</th>
            <th>Description</th>
            <th>Groupe</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($levels as $level)
            <tr>
              <td>{{ $level->name }}</td>
              <td>{{ $level->description }}</td>
              <td>{{ $level->group->name ?? 'Non Assigné' }}</td>
              <td>
                <a href="#" class="btn btn-primary edit-level" 
                   data-id="{{ $level->id }}"
                   data-name="{{ $level->name }}"
                   data-description="{{ $level->description }}"
                   data-group_id="{{ $level->group_id ?? '' }}"
                   data-toggle="modal" 
                   data-target="#editLevelModal">Modifier</a>
                <form action="{{ route('dashboard.levels.destroy', $level->id) }}" method="POST" style="display: inline;">
                 @csrf
                 @method('DELETE')
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce niveau ?')">Supprimer</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $levels->links() }}
    </div>
  </div>
</div>

<!-- Modal pour Ajouter un Niveau -->
<div class="modal fade" id="addLevelModal" tabindex="-1" role="dialog" aria-labelledby="addLevelModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="addLevelModalLabel">Ajouter un Nouveau Niveau</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route('dashboard.levels.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="levelName">Nom du Niveau</label>
            <input type="text" class="form-control" id="levelName" name="name" required>
          </div>
          <div class="form-group">
            <label for="levelDescription">Description</label>
            <textarea class="form-control" id="levelDescription" name="description" required></textarea>
          </div>
          <div class="form-group">
            <label for="groupSelect">Sélectionner un Groupe</label>
            <select class="form-control" id="groupSelect" name="group_id">
              <option value="">Aucun</option>
              @foreach ($groups as $group)
                <option value="{{ $group->id }}">{{ $group->name }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal pour Modifier un Niveau -->
<div class="modal fade" id="editLevelModal" tabindex="-1" role="dialog" aria-labelledby="editLevelModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="editLevelModalLabel">Modifier un Niveau</h4>
      </div>
      <div class="modal-body">
        <form id="editLevelForm" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="edit_levelName">Nom du Niveau</label>
            <input type="text" class="form-control" id="edit_levelName" name="name" required>
          </div>
          <div class="form-group">
            <label for="edit_levelDescription">Description</label>
            <textarea class="form-control" id="edit_levelDescription" name="description" required></textarea>
          </div>
          <div class="form-group">
            <label for="edit_groupSelect">Sélectionner un Groupe</label>
            <select class="form-control" id="edit_groupSelect" name="group_id">
              <option value="">Aucun</option>
              @foreach ($groups as $group)
                <option value="{{ $group->id }}">{{ $group->name }}</option>
              @endforeach
            </select>
          </div>
          <input type="hidden" name="levelid" id="hidden_levelid">
          <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('custom-scripts')
<script>
  $(document).on("click", ".edit-level", function () {
    var id = $(this).data('id');
    var name = $(this).data('name');
    var description = $(this).data('description');
    var group_id = $(this).data('group_id');

    $("#edit_levelName").val(name);
    $("#edit_levelDescription").val(description);
    $("#edit_groupSelect").val(group_id);
    $("#hidden_levelid").val(id);
    $("#editLevelForm").attr("action", "{{ route('dashboard.levels.update', '') }}/" + id);
  });
</script>
@endpush
