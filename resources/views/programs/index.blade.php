@extends('layouts.navbar')

@section('content')
    <div class="row">
        <div class="col-md-12 dash-left">
            <div class="row panel-quick-page">
                <div class="col-xs-4 col-sm-5 col-md-4 page-user">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">Cours programmés ({{ $numberOfPrograms }}) </h4>
                        </div>
                        <div class="panel-body">
                            <div class="page-icon"><i class="icon ion-person-stalker"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-5 col-md-4 page-events">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">Cours envoyés</h4>
                        </div>
                        <div class="panel-body">
                            <div class="page-icon"><i class="icon ion-ios-calendar-outline"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-5 col-md-4 page-messages">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">Cours en attente</h4>
                        </div>
                        <div class="panel-body">
                            <div class="page-icon"><i class="icon ion-email"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-5 col-md-4 page-reports">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">Exercices programmés</h4>
                        </div>
                        <div class="panel-body">
                            <div class="page-icon"><i class="icon ion-arrow-graph-up-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-5 col-md-4 page-statistics">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">Exercices envoyés</h4>
                        </div>
                        <div class="panel-body">
                            <div class="page-icon"><i class="icon ion-ios-pulse-strong"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-5 col-md-4 page-support">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">Exercices en attente</h4>
                        </div>
                        <div class="panel-body">
                            <div class="page-icon"><i class="icon ion-help-buoy"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contentpanel">
        <div class="row">
          <div class="col-12 people-list">
            <div class="people-options clearfix">
              <div class="btn-toolbar pull-left">
                {{-- <button type="button" class="btn btn-success btn-quirk">Programmer un cours</button> --}}
                <button class="btn btn-success btn-quirk" data-toggle="modal" data-target="#programCourseModal">
                  Programmer un cours
              </button>
                <button class="btn btn-success btn-quirk" data-toggle="modal" data-target="#programExerciseModal">
                  Programmer un exercice
              </button>
                {{-- <button type="button" class="btn btn-success btn-quirk">Programmer un exercice</button> --}}
                <button type="button" class="btn btn-default"><i class="fa fa-trash"></i></button>
              </div>

              <div class="btn-group pull-right people-pager">
                <a href="/" class="btn btn-default"><i class="fa fa-th"></i></a>
                <button type="button" class="btn btn-default-active"><i class="fa fa-th-list"></i></button>
              </div>

              <div class="btn-group pull-right people-pager">
                <button type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i></button>
                <button type="button" class="btn btn-default"><i class="fa fa-chevron-right"></i></button>
              </div>
              <span class="people-count pull-right">Showing <strong>1-10</strong> of <strong>34,404</strong> users</span>
            </div><!-- people-options -->


             <!-- Modal pour Ajouter un Cours -->
    <div class="modal fade" id="programCourseModal" tabindex="-1" role="dialog" aria-labelledby="programCourseModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="programCourseModalLabel">Ajouter un Nouveau Cours</h4>
              </div>
              <div class="modal-body">
                  <form action="{{ route('dashboard.programs.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label for="courseName">Nom du programme</label>
                          <input type="text" class="form-control" id="courseName" name="name" placeholder="Nom du cours" required>
                      </div>
                      <div class="form-group">
                          <label for="group_id">Cours</label>
                          <select class="form-control" id="course_id" name="course_id" required>
                              <option value="">Choisissez un cours</option>
                              @foreach($courses as $course)
                                  <option value="{{ $course->id }}">{{ $course->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="group_id">Niveau</label>
                          <select class="form-control" id="level_id" name="level_id" required>
                              <option value="">Choisissez un Niveau</option>
                              @foreach($levels as $level)
                                  <option value="{{ $level->id }}">{{ $level->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="start_date">Date de début</label>
                          <input type="date" id="start_date" name="start_date">
                      </div>
                      <div class="form-group">
                        <label for="start_time">Heure de début</label>
                        <input type="time" id="start_time" name="start_time">
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

       <!-- Modal pour Modifier un Cours Programmé -->
       <div class="modal fade" id="editProgramCourseModal" tabindex="-1" role="dialog"
       aria-labelledby="editProgramCourseModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg">
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                   <h4 class="modal-title" id="editProgramCourseModalLabel">Modifier un Cours Programmé</h4>
               </div>
               <div class="modal-body">
                   <form id="editProgramCourseForm"
                       action="{{ route('dashboard.programs.update', ['program' => 0]) }}" method="POST"
                       enctype="multipart/form-data">
                       @csrf
                       @method('PUT')
                       <div class="form-group">
                           <label for="editCourseName">Nom du programme</label>
                           <input type="text" class="form-control" id="editCourseName" name="name"
                               placeholder="Nom du cours" required>
                       </div>
                       <div class="form-group">
                           <label for="editCourseId">Cours</label>
                           <select class="form-control" id="editCourseId" name="course_id" required>
                               <option value="">Choisissez un cours</option>
                               @foreach($courses as $course)
                                   <option value="{{ $course->id }}">{{ $course->name }}</option>
                               @endforeach
                           </select>
                       </div>
                       <div class="form-group">
                           <label for="editLevelId">Niveau</label>
                           <select class="form-control" id="editLevelId" name="level_id" required>
                               <option value="">Choisissez un Niveau</option>
                               @foreach($levels as $level)
                                   <option value="{{ $level->id }}">{{ $level->name }}</option>
                               @endforeach
                           </select>
                       </div>
                       <div class="form-group">
                           <label for="editStartDate">Date de début</label>
                           <input type="date" id="editStartDate" name="start_date">
                       </div>
                       <div class="form-group">
                           <label for="editStartTime">Heure de début</label>
                           <input type="time" id="editStartTime" name="start_time">
                       </div>

                       <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                   </form>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
               </div>
           </div>
       </div>
   </div>

             <!-- Modal pour Ajouter un exercice -->
    <div class="modal fade" id="programExerciseModal" tabindex="-1" role="dialog" aria-labelledby="programExerciseModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="programExerciseModalLabel">Programmer un exercice</h4>
              </div>
              <div class="modal-body">
                  <form action="{{ route('dashboard.programs.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label for="courseName">Nom du programme</label>
                          <input type="text" class="form-control" id="courseName" name="name" placeholder="Nom du cours" required>
                      </div>
                      <div class="form-group">
                          <label for="group_id">Cours</label>
                          <select class="form-control" id="exercise_id" name="exercise_id" required>
                              <option value="">Choisissez un exercice</option>
                              @foreach($exercises as $exercise)
                                  <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="group_id">Niveau</label>
                          <select class="form-control" id="level_id" name="level_id" required>
                              <option value="">Choisissez un Niveau</option>
                              @foreach($levels as $level)
                                  <option value="{{ $level->id }}">{{ $level->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="start_date">Date de début</label>
                          <input type="date" id="start_date" name="start_date">
                      </div>
                      <div class="form-group">
                        <label for="start_time">Heure de début</label>
                        <input type="time" id="start_time" name="start_time">
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

  <style>
    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 10px;
    }

    .card {
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
        border-radius: 10px;
        overflow: hidden;
    }

    .card-header {
        padding: 20px;
        font-weight: bold;
        color: #333;
    }

    .card-body {
        padding: 20px;
        color: #666;
    }

    .card-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .card-meta i {
        margin-right: 5px;
    }

    .card-meta p {
        margin: 0;
    }
</style>

<div class="grid-container">
  <!-- Afficher les cours programmés -->
  @foreach($programs as $program)
      <div class="card">
          <div class="card-header">
              {{ $program->name }}
          </div>
          <div class="card-body">
              <div class="card-meta">
                  @if ($program->course)
                      <p><i class="glyphicon glyphicon-briefcase"></i> {{ $program->course->name }}</p>
                  @endif
                  <p><i class="glyphicon glyphicon-calendar"></i> {{ $program->start_date }}</p>
              </div>
              <p><strong>Nom du programme:</strong> {{ $program->name }}</p>
              <p><strong>Date de début:</strong> {{ $program->start_date }}</p>
              @if ($program->course)
                  <p><strong>Cours associé:</strong> {{ $program->course->name }}</p>
              @else
                  <p><strong>Cours associé:</strong> Aucun cours associé</p>
              @endif
          </div>
          <div class="card-footer d-flex justify-content-between">
              <button type="button" class="btn btn-primary" data-toggle="modal"
                  data-target="#editProgramCourseModal"
                  data-program-id="{{ $program->id }}"
                  data-program-name="{{ $program->name }}"
                  data-course-id="{{ $program->course_id }}"
                  data-level-id="{{ $program->level_id }}"
                  data-start-date="{{ $program->start_date }}"
                  data-start-time="{{ $program->start_time }}">Modifier</button>
              <form action="{{ route('dashboard.programs.destroy', $program->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce programme ?')">Supprimer</button>
              </form>
          </div>
      </div>
  @endforeach
</div>


</div>
</div>
</div>
           
        </div>

          </div>
         
        </div><!-- row -->

    </div>

@endsection

@push('scripts')
<script>
  $('#editProgramCourseModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var programId = button.data('program-id');
      var programName = button.data('program-name');
      var courseId = button.data('course-id');
      var levelId = button.data('level-id');
      var startDate = button.data('start-date');
      var startTime = button.data('start-time');

      var modal = $(this);
      modal.find('.modal-title').text('Modifier le Cours Programmé');
      modal.find('#editCourseName').val(programName);
      modal.find('#editCourseId').val(courseId);
      modal.find('#editLevelId').val(levelId);
      modal.find('#editStartDate').val(startDate);
      modal.find('#editStartTime').val(startTime);

      var actionUrl = "{{ route('dashboard.programs.update', ['program' => 0]) }}";
      actionUrl = actionUrl.slice(0, -1) + programId;
      modal.find('#editProgramCourseForm').attr('action', actionUrl);
  });
</script>
@endpush
