@extends('layouts.navbar')

@section('content')
<div class="panel">
    <div class="panel-heading">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addExerciseModal">
            Ajouter un exercice
        </button>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="dataTable1" class="table table-bordered table-primary table-striped-col dataTable" role="grid">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Cours</th>
                        <th>Fichiers</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exercises as $exercise)
                    <tr>
                        <td>{{ $exercise->name }}</td>
                        <td>{!! $exercise->content !!}</td>
                        <td>{{ $exercise->course->name ?? 'ND' }}</td>
                        <td> 
                            @forelse ($exercise->files as $file)
                            <p><a href="{{ asset($file->file) }}" target="_blank">Fichier</a></p>
                            @empty
                            <p>Aucun fichier</p>
                            @endforelse
                        </td>
                        <td>
                            <a href="#" class="btn btn-primary update" 
                                data-id="{{ $exercise->id }}" 
                                data-name="{{ $exercise->name }}" 
                                data-content="{{ $exercise->content }}"
                                data-course_id="{{ $exercise->course_id }}"
                                data-toggle="modal" 
                                data-target="#editExerciseModal"
                            >Modifier</a>
                            <form action="{{ route('dashboard.exercises.destroy', $exercise->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cet exercice ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal pour Ajouter un Exercice -->
<div class="modal fade" id="addExerciseModal" tabindex="-1" role="dialog" aria-labelledby="addExerciseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="addExerciseModalLabel">Ajouter un nouvel exercice</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.exercises.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exerciseName">Nom de l'exercice</label>
                        <input type="text" class="form-control" id="exerciseName" name="name" placeholder="Nom de l'exercice" required>
                    </div>
                    <div class="form-group">
                        <label for="exerciseContent">Description de l'exercice</label>
                        <textarea class="form-control" id="exerciseContent" name="content" placeholder="Description de l'exercice" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="course_id">Cours</label>
                        <select class="form-control" id="course_id" name="course_id" required>
                            <option value="">Choisissez un cours</option>
                            @foreach($courseList as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exerciseFiles">Fichiers</label>
                        <input type="file" id="exerciseFiles" name="files[]" multiple>
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

<!-- Modal pour Modifier un Exercice -->
<div class="modal fade" id="editExerciseModal" tabindex="-1" role="dialog" aria-labelledby="addExerciseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="addExerciseModalLabel">Modifier un Exercice</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.exercises.update', $exercise->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="editExerciseName">Nom de l'exercice</label>
                        <input type="text" class="form-control" id="editExerciseName" name="name" placeholder="Nom de l'exercice" required>
                    </div>
                    <div class="form-group">
                        <label for="editExerciseContent">Description de l'exercice</label>
                        <textarea class="form-control" id="editExerciseContent" name="content" placeholder="Description de l'exercice" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editCourse_id">Cours</label>
                        <select class="form-control" id="editCourse_id" name="course_id" required>
                            <option value="">Choisissez un cours</option>
                            @foreach($courseList as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="exerciseid" id="editHiddenExerciseId">
                    <div class="form-group">
                        <label for="editExerciseFiles">Fichiers</label>
                        <input type="file" id="editExerciseFiles" name="files[]" multiple>
                    </div>
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
    $(document).on("click", ".update", function () {
        var exerciseId = $(this).data('id');
        var name = $(this).data('name');
        var content = $(this).data('content');
        var course_id = $(this).data('course_id');

        $("#editExerciseName").val(name);
        $("#editExerciseContent").val(content);
        $("#editCourse_id").val(course_id);
        $("#editHiddenExerciseId").val(exerciseId);
    });
</script>
@endpush
