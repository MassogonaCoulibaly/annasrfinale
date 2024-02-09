@extends('layouts.navbar')

@section('content')
<div class="panel">
  <div class="panel-heading">
    <button class="btn btn-primary" data-toggle="modal" data-target="#addGroupModal">
      Ajouter un groupe
    </button>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table id="dataTable1" class="table table-bordered table-primary table-striped-col dataTable" role="grid">
        <thead>
          <tr>
            <th>Nom du Groupe</th>
            <th>Contenu</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($groups as $group)
            <tr>
              <td>{{ $group->name }}</td>
              <td>{{ $group->content }}</td>
              <td>
                <a href="#" class="btn btn-primary edit" 
                   data-id="{{ $group->id }}" 
                   data-name="{{ $group->name }}" 
                   data-content="{{ $group->content }}" 
                   data-toggle="modal" 
                   data-target="#editGroupModal">Modifier</a>
                <form action="{{ route('dashboard.groups.destroy', $group->id) }}" method="POST" style="display: inline;">
                 @csrf
                 @method('DELETE')
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce groupe ?')">Supprimer</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $groups->links() }}
    </div>
  </div>
</div>

<!-- Modal pour Ajouter un Groupe -->
<div class="modal fade" id="addGroupModal" tabindex="-1" role="dialog" aria-labelledby="addGroupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="addGroupModalLabel">Ajouter un Nouveau Groupe</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route('dashboard.groups.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="groupName">Nom du Groupe</label>
            <input type="text" class="form-control" id="groupName" name="name" required>
          </div>
          <div class="form-group">
            <label for="groupContent">Contenu</label>
            <textarea class="form-control" id="groupContent" name="content" required></textarea>
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

<!-- Modal pour Modifier un Groupe -->
<div class="modal fade" id="editGroupModal" tabindex="-1" role="dialog" aria-labelledby="editGroupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="editGroupModalLabel">Modifier un Groupe</h4>
      </div>
      <div class="modal-body">
        <form id="editGroupForm" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="edit_groupName">Nom du Groupe</label>
            <input type="text" class="form-control" id="edit_groupName" name="name" required>
          </div>
          <div class="form-group">
            <label for="edit_groupContent">Contenu</label>
            <textarea class="form-control" id="edit_groupContent" name="content" required></textarea>
          </div>
          <input type="hidden" name="groupid" id="hidden_groupid">
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
  $(document).on("click", ".edit", function () {
    var id = $(this).data('id');
    var name = $(this).data('name');
    var content = $(this).data('content');

    $("#edit_groupName").val(name);
    $("#edit_groupContent").val(content);
    $("#hidden_groupid").val(id);
    $("#editGroupForm").attr("action", "{{ route('dashboard.groups.update', '') }}/" + id);
  });
</script>
@endpush
