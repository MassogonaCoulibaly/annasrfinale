@extends('layouts.navbar')

@section('content')
<div class="panel">
    <div class="panel-heading">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addStudentModal">
            Ajouter un étudiant
        </button>

        <!-- Formulaire d'Importation CSV -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importModal">
            Importer un fichier CSV
        </button>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="dataTable1" class="table table-bordered table-primary table-striped-col dataTable" role="grid">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Téléphone</th>
                        <th>Groupes</th>
                        <th>Niveaux</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->firstname }}</td>
                        <td>{{ $student->lastname }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->group->name ?? "Groupe Retiré" }}</td>
                        <td>{{ $student->level->name ?? "Niveau Retiré" }}</td>
                        <td>
                            <a href="#" class="btn btn-primary update" 
                                data-id="{{ $student->id }}" 
                                data-firstname="{{ $student->firstname }}" 
                                data-lastname="{{ $student->lastname }}"
                                data-phone="{{ $student->phone }}" 
                                data-group_id="{{ $student->group_id }}"
                                data-level_id="{{ $student->level_id }}"
                                data-toggle="modal" 
                                data-target="#editStudentModal"
                            >Modifier</a>
                            <form action="{{ route('dashboard.students.destroy', $student->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $students->links() }}
        </div>
    </div>
</div>

<!-- Modal pour Ajouter un Étudiant -->
<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="addStudentModalLabel">Ajouter un Nouvel Étudiant</h4>
            </div>
            <div class="modal-body">
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
                            <option>Choisissez un groupe</option>
                            @forelse($groupeList as $g)
                            <option value="{{ $g->id }}">{{ $g->name }}</option>
                            @empty
                            <option value="">Aucun groupe disponible</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="studentLevel">Niveaux</label>
                        <select class="form-control" id="studentlevel" name="level_id" required>
                            <option>Choisissez un Niveau</option>
                            @forelse($levelList as $l)
                            <option value="{{ $l->id }}">{{ $l->name }}</option>
                            @empty
                            <option value="">Aucun niveau disponible</option>
                            @endforelse
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

<!-- Modal pour Modifier un Étudiant -->
<div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="addStudentModalLabel">Modifier un Étudiant</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.students.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="edit_studentLastName">Nom</label>
                        <input type="text" class="form-control" id="edit_studentLastName" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_studentFirstName">Prénom</label>
                        <input type="text" class="form-control" id="edit_studentFirstName" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_studentPhone">Téléphone</label>
                        <input type="text" class="form-control" id="edit_studentPhone" name="phone" required>
                    </div>
                    <input type="hidden" name="studentid" id="hidden_studentid">
                    <div class="form-group">
                        <label for="edit_studentGroup">Groupe</label>
                        <select class="form-control" id="edit_studentGroup" name="group_id" required>
                            <option>Choisissez un groupe</option>
                            @forelse($groupeList as $g)
                            <option value="{{ $g->id }}">{{ $g->name }}</option>
                            @empty
                            <option value="">Aucun groupe disponible</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_studentLevel">Niveaux</label>
                        <select class="form-control" id="edit_studentLevel" name="level_id" required>
                            <option>Choisissez un Niveau</option>
                            @forelse($levelList as $level)
                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                            @empty
                            <option value="">Aucun niveau disponible</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('custom-scripts')
<script>
    $(document).on("click", ".update", function () {
        var firstname = $(this).data('firstname');
        var lastname = $(this).data('lastname');
        var phone = $(this).data('phone');
        var group_id = $(this).data('group_id');
        var level_id = $(this).data('level_id');
        var studentid = $(this).data('id');

        $("#edit_studentFirstName").val(firstname);
        $("#edit_studentLastName").val(lastname);
        $("#edit_studentPhone").val(phone);
        $("#edit_studentGroup").val(group_id);
        $("#edit_studentLevel").val(level_id);
        $(".modal-body #hidden_studentid").val(studentid);
        $('#edit_studentLastName').val(lastname);

        $(".modal-body #edit_studentFirstName").val(firstname);
        $(".modal-body #edit_studentLastName").val(lastname);
        $(".modal-body #edit_studentPhone").val(phone);
        $(".modal-body #edit_studentGroup").val(group_id);
        $(".modal-body #edit_studentLevel").val(level_id);
        $(".modal-body #hidden_studentid").val(studentid);
    });
</script>
@endpush
