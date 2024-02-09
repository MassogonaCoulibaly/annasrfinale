<header>
    <div class="headerpanel">
  
      <div class="logopanel">
        <h2><a href="{{ route('dashboard') }}">{{env('APP_NAME')}}</a></h2>
      </div><!-- logopanel -->
  
      <div class="headerbar">
  
        <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
  
        <div class="searchpanel">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
            </span>
          </div><!-- input-group -->
        </div>
  
        <div class="header-right">
          <ul class="headermenu">
            <li>
              <div id="noticePanel" class="btn-group">
                <button class="btn btn-notice alert-notice" data-toggle="dropdown">
                  <i class="fa fa-globe"></i>
                </button>
                <div id="noticeDropdown" class="dropdown-menu dm-notice pull-right">
                  <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                      <li class="active"><a data-target="#notification" data-toggle="tab">Notifications ({{ Auth::user()->unReadNotifications()->count()}})</a></li>
                    </ul>
  
                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="notification">
                        <ul class="list-group notice-list">
                          @foreach (Auth::user()->unReadNotifications()->take(5)->get() as $notification)
                          <li class="list-group-item unread">
                            <div class="row">
                              <div class="col-xs-2">
                                <i class="fa fa-envelope"></i>
                              </div>
                              <div class="col-xs-10">
                                <h5><a href="">{{$notification->content}}</a></h5>
                                <small>{{ $notification->created_at}} </small>
                                <span>{{ $notification->content }}</span>
                              </div>
                            </div>
                          </li>
                          @endforeach
                          @foreach (Auth::user()->readNotifications()->take(5)->get() as $notification)
                            <li class="list-group-item">
                            <div class="row">
                              <div class="col-xs-2">
                                <i class="fa fa-envelope"></i>
                              </div>
                              <div class="col-xs-10">
                                <h5><a href="">{{$notification->content}}</a></h5>
                                <small>{{ $notification->created_at}} </small>
                                <span>{{ $notification->content }}</span>
                              </div>
                            </div>
                          </li>
                          @endforeach
                        </ul>
                        <a class="btn-more" href="">Voir tous .... <i class="fa fa-long-arrow-right"></i></a>
                      </div><!-- tab-pane -->
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="btn-group">
                <button type="button" class="btn btn-logged" data-toggle="dropdown">
                  <img src="{{asset(Auth::user()->photo)}}" alt="" />
                  Elen Adarna
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right">
                  <li><a href="profile.html"><i class="glyphicon glyphicon-user"></i> Mon Profil</a></li>
                  <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Parametres</a></li>
                  {{-- <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li> --}}
                  <li><a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    ><i class="glyphicon glyphicon-log-out"></i> Se deconnecter</a></li>
                </ul>
              </div>
            </li>
            <li>
              <button id="chatview" class="btn btn-chat alert-notice">
                <span class="badge-alert"></span>
                <i class="fa fa-comments-o"></i>
              </button>
            </li>
          </ul>
        </div><!-- header-right -->
      </div><!-- headerbar -->
    </div><!-- header-->

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
  </header>