<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ env('APP_NAME')}}</title>

    <link rel="stylesheet" href="{{ asset('asset/css/hover.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/weather-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/toggles-full.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('/asset/css/dataTables.bootstrap.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap3-wysihtml5.css') }}">

    <link rel="stylesheet" href="{{ asset('asset/css/quirk.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/summernote.css') }}"> 
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap3-wysihtml5.css') }}"> 

    <script src="{{ asset('asset/js/modernizr.js') }}"></script>

  </head>

  <body>

    @include('layouts.header')

    <section>
      @include('layouts.sidebar')
      <div class="mainpanel">

        <div class="contentpanel">
          <ol class="breadcrumb breadcrumb-quirk">
            <li><a href="/"><i class="fa fa-home mr5"></i> Accueil</a></li>
            <li class="active">{{ $title ?? "Dashboard"}}</li>
          </ol>
          @yield('content')

        </div>

      </div>

    </section>
    {{-- If session has error  --}}
    @if (Session::get('error'))
    <div id="gritter-notice-wrapper">
      <div id="gritter-item-11" class="gritter-item-wrapper with-icon times-circle danger"
        style="opacity: 0; overflow: hidden; height: 68.0803px;" role="alert">
        <div class="gritter-top"></div>
        <div class="gritter-item"><a class="gritter-close" href="#" tabindex="1">Fermer la Notification</a>
          <div class="gritter-without-image"><span class="gritter-title">Erreur</span>
            <p>{{ Session::get('error')}}</p>
          </div>
          <div style="clear:both"></div>
        </div>
        <div class="gritter-bottom"></div>
      </div>
      @endif
      @if (Session::get('success'))
      <div id="gritter-notice-wrapper">
        <div id="gritter-item-11" class="gritter-item-wrapper with-icon check-circle success"
          style="opacity: 0; overflow: hidden; height: 68.0803px;" role="alert">
          <div class="gritter-top"></div>
          <div class="gritter-item"><a class="gritter-close" href="#" tabindex="1">Fermer la Notification</a>
            <div class="gritter-without-image"><span class="gritter-title">Success</span>
              <p>{{ Session::get('success')}}</p>
            </div>
            <div style="clear:both"></div>
          </div>
          <div class="gritter-bottom"></div>
        </div>
        @endif



        @include('layouts.footer')
        <script>
          $(document).ready(function() {
            var activeLink = localStorage.getItem('activeLink');
            if (activeLink) {
              $('#mainmenu li').removeClass('active');
              $('#' + activeLink).addClass('active');
            }

            $('#mainmenu li').click(function() {
              $('#mainmenu li').removeClass('active');
              $(this).addClass('active');

              var id = $(this).attr('id');
              localStorage.setItem('activeLink', id);
            });
          });
        </script>

  </body>

</html>