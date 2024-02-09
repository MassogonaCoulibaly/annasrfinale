@extends('layouts.navbar')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addCourseModal">
                Ajouter un cours
            </button>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="dataTable1" class="table table-bordered table-primary table-striped-col dataTable" role="grid">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Groupe</th>
                            <th>Fichiers</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{ $course->name }}</td>
                                <td>{!! $course->content !!}</td>
                                <td>{{ $course->group->name ?? 'ND' }}</td>
                                <td> 
                                    @forelse ($course->files as $file)
                                        <p><a href="{{ asset($file->file) }}" target="_blank">Fichier N˚{{ $i }}</a></p>
                                        @php
                                            $i++;
                                        @endphp
                                    @empty
                                        <p>Aucun fichier</p>
                                    @endforelse
                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary update" 
                                        data-id="{{ $course->id }}" 
                                        data-name="{{ $course->name }}" 
                                        data-content="{{ $course->content }}"
                                        data-group_id="{{ $course->group_id }}"
                                        data-file="{{ $course->file }}"
                                        data-toggle="modal" 
                                        data-target="#editCourseModal">Modifier</a>
                                    
                                    <form action="{{ route('dashboard.courses.destroy', $course->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce cours ?')">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal pour Ajouter un Cours -->
    <div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="addCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="addCourseModalLabel">Ajouter un Nouveau Cours</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dashboard.courses.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="courseName">Nom du cours</label>
                            <input type="text" class="form-control" id="courseName" name="name" placeholder="Nom du cours" required>
                        </div>
                        <div class="form-group">
                            <label for="courseContent">Contenu du cours</label>
                            <textarea class="form-control" id="wysiwyg" name="content" placeholder="Contenu du cours" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="group_id">Groupe</label>
                            <select class="form-control" id="group_id" name="group_id" required>
                                <option value="">Choisissez un groupe</option>
                                @foreach($groupeList as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="courseFiles">Fichiers du cours</label>
                            <input type="file" id="courseFiles" name="files[]" multiple>
                        </div>
                        <!-- Ajoutez d'autres champs si nécessaire -->
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal pour Modifier un Cours -->
    <div class="modal fade" id="editCourseModal" tabindex="-1" role="dialog" aria-labelledby="editCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="editCourseModalLabel">Modifier un Cours</h4>
                </div>
                <div class="modal-body">
                    <form id="editCourseForm" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="editCourseName">Nom du cours</label>
                            <input type="text" class="form-control" id="editCourseName" name="name" placeholder="Nom du cours" required>
                        </div>
                        <div class="form-group">
                            <label for="editCourseContent">Contenu du cours</label>
                            <textarea class="form-control" id="editwysiwyg" name="content" placeholder="Contenu du cours" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editGroup_id">Groupe</label>
                            <select class="form-control" id="editGroup_id" name="group_id" required>
                                <option value="">Choisissez un groupe</option>
                                @foreach($groupeList as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="courseid" id="edithidden_courseid">
                        <div class="form-group">
                            <label for="editCourseFiles">Fichiers du cours</label>
                            <input type="file" id="editCourseFiles" name="files[]" multiple>
                        </div>
                        <!-- Autres champs nécessaires pour le Cours -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('custom-scripts')
    <script>
        $(document).on("click", ".update", function () {
            var courseid = $(this).data('id');
            var name = $(this).data('name');
            var content = $(this).data('content');
            var group_id = $(this).data('group_id');
            var file = $(this).data('file');
            
            $("#editCourseName").val(name); 
            $("#editwysiwyg").val(content); 
            $("#editGroup_id").val(group_id); 
            $("#edithidden_courseid").val(courseid);
            $("#editCourseForm").attr("action", "/admin/courses/" + courseid);
        });
    </script>
@endpush
@endsection
