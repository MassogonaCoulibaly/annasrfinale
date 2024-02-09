
<div class="leftpanel">
    <div class="leftpanelinner">

      <!-- ################## LEFT PANEL PROFILE ################## -->

      <div class="media leftpanel-profile">
        <div class="media-left">
          <a href="#">
            <img src="{{asset(Auth::user()->photo)}}" alt="" class="media-object img-circle">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading">{{ ucfirst(Auth::user()->name) }} <a data-toggle="collapse" data-target="#loguserinfo" class="pull-right"><i class="fa fa-angle-down"></i></a></h4>
          <span>{{ ucfirst(Auth::user()->role) }}</span>
        </div>
      </div><!-- leftpanel-profile -->

      <div class="leftpanel-userinfo collapse" id="loguserinfo">
        <h5 class="sidebar-title">Address</h5>
        <address>
          Ouagadougou
        </address>
        <h5 class="sidebar-title">Contact</h5>
        <ul class="list-group">
          <li class="list-group-item">
            <label class="pull-left">Email</label>
            <span class="pull-right">{{ Auth::user()->email }}</span>
          </li>
          
          <li class="list-group-item">
            <label class="pull-left">Depuis</label>
            <span class="pull-right">{{ Auth::user()->created_at }}</span>
          </li>
        </ul>
      </div><!-- leftpanel-userinfo -->

      <ul class="nav nav-tabs nav-justified nav-sidebar">
        <li class="tooltips active" data-toggle="tooltip" title="Menu Principal"><a data-toggle="tab" data-target="#mainmenu"><i class="tooltips fa fa-ellipsis-h"></i></a></li>
        <li class="tooltips unread" data-toggle="tooltip" title="Whatsapp"><a data-toggle="tab" data-target="#emailmenu"><i class="tooltips fa fa-envelope"></i></a></li>
        <li class="tooltips" data-toggle="tooltip" title="Contacts"><a data-toggle="tab" data-target="#contactmenu"><i class="fa fa-user"></i></a></li>
        <li class="tooltips" data-toggle="tooltip" title="Paramettrage"><a data-toggle="tab" data-target="#settings"><i class="fa fa-cog"></i></a></li>
        <li class="tooltips" data-toggle="tooltip" title="Deconnexion"><a href="{{ route('logout') }}"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
          ><i class="fa fa-sign-out"></i></a></li>
      </ul>

      <div class="tab-content">

        <!-- ################# MAIN MENU ################### -->

        <div class="tab-pane active" id="mainmenu">

          <h5 class="sidebar-title">Racourcis</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk">
            <li class="active" id="dashboard-mainmenu"><a href="{{ route('dashboard.home') }}"><i class="fa fa-home"></i> <span>Tableau de board</span></a></li>
            <li class="" id="groups-index-mainmenu"><a href="{{ route('dashboard.groups.index') }}"><i class="fa fa-file-text"></i> Groupes<span></span></a></li>
            <li class="" id="groups-index-mainmenu"><a href="{{ route('dashboard.levels.index') }}"><i class="fa fa-file-text"></i> Niveaux<span></span></a></li>
            <li class="" id="students-index-mainmenu"><a href="{{ route('dashboard.students.index') }}"><i class="fa fa-cube"></i> <span>Elèves</span></a></li>
            <li class="" id="cours-index-mainmenu"><a href="{{ route('dashboard.courses.index') }}"><i class="fa fa-file-text"></i> Cours<span></span></a></li>
            <li class="" id="exercise-index-mainmenu"><a href="{{ route('dashboard.exercises.index') }}"><i class="fa fa-file-text"></i> Exercices<span></span></a></li>
            <li class="" id="programs-index-mainmenu"><a href="{{ route('dashboard.programs.index') }}"><i class="fa fa-file-text"></i> Programmes<span></span></a></li>
          </ul>

          <h5 class="sidebar-title">Espace Admin</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk">
            <li class="" id="add-colab-mainmenu"><a href="{{ route('add.colab') }}"><i class="fa fa-plus"></i> Ajouter un Secretaire<span></span></a></li>
            <li class="" id="-mainmenu"><a href="{{ route('profile.edit') }}"><i class="fa fa-file-text"></i> Profile<span></span></a></li>
          </ul>

          <h5 class="sidebar-title">Esapce Etudiants</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk">
            <li class="" id="students-add-mainmenu"><a href="{{ route('dashboard.students.create') }}"> <i class="fa fa-plus"></i> Ajouter un élève</a>
            <li class="" id="students-index-mainmenu"><a href="{{ route('dashboard.students.index') }}"> <i class="fa fa-file-text"></i> Liste des élèves</a>
          </ul>

          <h5 class="sidebar-title">Esapce Cours</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk">
            <li class="" id="-mainmenu"><a href="{{ route('dashboard.courses.create') }}"> <i class="fa fa-plus"></i> Ajouter un cours</a>
            <li class="" id="-mainmenu"><a href="{{ route('dashboard.courses.index') }}"> <i class="fa fa-file-text"></i> Liste des cours</a>
          </ul>

          <h5 class="sidebar-title">Esapce Exercices</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk">
            <li class="" id="-mainmenu"><a href="{{ route('dashboard.exercises.create') }}"> <i class="fa fa-plus"></i> Ajouter un exercise</a>
            <li class="" id="-mainmenu"><a href="{{ route('dashboard.exercises.index') }}"> <i class="fa fa-file-text"></i> Liste des exercises</a>
          </ul>

          <h5 class="sidebar-title">Esapce Programmes</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk">
            <li class="nav-parent">
              <a href=""><i class="fa fa-check-square"></i> <span> Nouveau</span></a>
              <ul class="children">
                <li><a href="{{ route('dashboard.programs.create') }}">Envoyer un cours</a></li>
                <li><a href="{{ route('dashboard.programs.create') }}">Envoyer un exercice</a></li>
              </ul>
            </li>
            <li class="" id="-mainmenu"><a href="{{ route('dashboard.programs.index') }}"> <i class="fa fa-file-text"></i> Liste des programmes</a>
          </ul>

        </div><!-- tab-pane -->

        <!-- ######################## EMAIL MENU ##################### -->

        <div class="tab-pane" id="emailmenu">
          <div class="sidebar-btn-wrapper">
            <a href="compose.html" class="btn btn-danger btn-block">Nouveau</a>
          </div>

          <h5 class="sidebar-title">Whatsapp</h5>
          {{-- <ul class="nav nav-pills nav-stacked nav-quirk nav-mail">
            <li><a href="email.html"><i class="fa fa-inbox"></i> <span>Inbox (3)</span></a></li>
            <li><a href="email.html"><i class="fa fa-pencil"></i> <span>Draft (2)</span></a></li>
            <li><a href="email.html"><i class="fa fa-paper-plane"></i> <span>Sent</span></a></li>
          </ul> --}}

          {{-- <h5 class="sidebar-title">Tags</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk nav-label">
            <li><a href="#"><i class="fa fa-tags primary"></i> <span>Communication</span></a></li>
            <li><a href="#"><i class="fa fa-tags success"></i> <span>Updates</span></a></li>
            <li><a href="#"><i class="fa fa-tags warning"></i> <span>Promotions</span></a></li>
            <li><a href="#"><i class="fa fa-tags danger"></i> <span>Social</span></a></li>
          </ul> --}}
        </div><!-- tab-pane -->

        <!-- ################### CONTACT LIST ################### -->

        <div class="tab-pane" id="contactmenu">
          <div class="input-group input-search-contact">
            <input type="text" class="form-control" placeholder="Search contact">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
            </span>
          </div>
          <h5 class="sidebar-title">Contacts</h5>
          {{-- <ul class="media-list media-list-contacts">
            <li class="media">
              <a href="#">
                <div class="media-left">
                    <img class="media-object img-circle" src="{{ asset('images/default.jpg')}}" alt="">
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Christina R. Hill</h4>
                  <span><i class="fa fa-phone"></i> 386-752-1860</span>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="#">
                <div class="media-left">
                  <img class="media-object img-circle" src="{{ asset('images/default.jpg')}}" alt="">
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Floyd M. Romero</h4>
                  <span><i class="fa fa-mobile"></i> +1614-650-8281</span>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="#">
                <div class="media-left">
                  <img class="media-object img-circle" src="{{ asset('images/default.jpg')}}" alt="">
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Jennie S. Gray</h4>
                  <span><i class="fa fa-phone"></i> 310-757-8444</span>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="#">
                <div class="media-left">
                  <img class="media-object img-circle" src="{{ asset('images/default.jpg')}}" alt="">
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Alia J. Locher</h4>
                  <span><i class="fa fa-mobile"></i> +1517-386-0059</span>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="#">
                <div class="media-left">
                  <img class="media-object img-circle" src="{{ asset('images/default.jpg')}}" alt="">
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Nicholas T. Hinkle</h4>
                  <span><i class="fa fa-skype"></i> nicholas.hinkle</span>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="#">
                <div class="media-left">
                  <img class="media-object img-circle" src="{{ asset('images/default.jpg')}}" alt="">
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Jamie W. Bradford</h4>
                  <span><i class="fa fa-phone"></i> 225-270-2425</span>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="#">
                <div class="media-left">
                  <img class="media-object img-circle" src="{{ asset('images/default.jpg')}}" alt="">
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Pamela J. Stump</h4>
                  <span><i class="fa fa-mobile"></i> +1773-879-2491</span>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="#">
                <div class="media-left">
                  <img class="media-object img-circle" src="{{ asset('images/default.jpg')}}" alt="">
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Refugio C. Burgess</h4>
                  <span><i class="fa fa-mobile"></i> +1660-627-7184</span>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="#">
                <div class="media-left">
                  <img class="media-object img-circle" src="{{ asset('images/default.jpg')}}" alt="">
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Ashley T. Brewington</h4>
                  <span><i class="fa fa-skype"></i> ashley.brewington</span>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="#">
                <div class="media-left">
                  <img class="media-object img-circle" src="{{ asset('images/default.jpg')}}g" alt="">
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Roberta F. Horn</h4>
                  <span><i class="fa fa-phone"></i> 716-630-0132</span>
                </div>
              </a>
            </li>
          </ul> --}}
        </div><!-- tab-pane -->

        <!-- #################### SETTINGS ################### -->

        <div class="tab-pane" id="settings">
          <h5 class="sidebar-title"></h5>
          {{-- <ul class="list-group list-group-settings">
            <li class="list-group-item">
              <h5>Daily Newsletter</h5>
              <small>Get notified when someone else is trying to access your account.</small>
              <div class="toggle-wrapper">
                <div class="leftpanel-toggle toggle-light success"></div>
              </div>
            </li>
            <li class="list-group-item">
              <h5>Call Phones</h5>
              <small>Make calls to friends and family right from your account.</small>
              <div class="toggle-wrapper">
                <div class="leftpanel-toggle-off toggle-light success"></div>
              </div>
            </li>
          </ul> --}}
          <h5 class="sidebar-title"></h5>
          {{-- <ul class="list-group list-group-settings">
            <li class="list-group-item">
              <h5>Login Notifications</h5>
              <small>Get notified when someone else is trying to access your account.</small>
              <div class="toggle-wrapper">
                <div class="leftpanel-toggle toggle-light success"></div>
              </div>
            </li>
            <li class="list-group-item">
              <h5>Phone Approvals</h5>
              <small>Use your phone when login as an extra layer of security.</small>
              <div class="toggle-wrapper">
                <div class="leftpanel-toggle toggle-light success"></div>
              </div>
            </li>
          </ul> --}}
        </div>


      </div><!-- tab-content -->

    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->
