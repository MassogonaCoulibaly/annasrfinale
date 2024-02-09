@extends('layouts.navbar')

@section('content')
<div class="panel">
  <div class="panel-heading">
    <button class="btn btn-primary" onclick="window.location.href='{{ route('dashboard.groups.create') }}'">
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
                <a href="{{ route('dashboard.groups.edit', $group->id) }}" class="btn btn-primary">Modifier</a>
                <form action="{{ route('dashboard.groups.destroy', $group->id) }}" method="POST" style="display: inline;">
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
@endsection
