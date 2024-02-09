@extends('layouts.app')

@section('content')
<body class="signwrapper">

    <div class="sign-overlay"></div>
    <div class="signpanel"></div>
  
    <div class="panel signin">
      <div class="panel-heading">
        <h1>{{ env('APP_NAME')}}</h1>
        <h4 class="panel-title">Bienvenue! Connecter veuillez vous connecter.</h4>
      </div>
      <div class="panel-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf
          <div class="form-group mb10">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input type="email" class="form-control" name="email" value="{{old('email')}}" required autofocus autocomplete="username" placeholder="Entrer votre nom">
            </div>
          </div>
          <div class="form-group nomargin">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" name="password" required autocomplete="current-password"  class="form-control" placeholder="Entrer un mot de passe">
            </div>
          </div>
          <div class="form-group mt20">
            <label class="ckbox">
              <input type="checkbox" name="remember">
              <span>{{ __('Se rappeller de moi') }}</span>
            </label>
          </div>
          <div>
            @if (Route::has('password.request'))
                <a  class="forgot" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublier?') }}
                </a>
            @endif
        </div>
          <div class="form-group">
            <button class="btn btn-success btn-quirk btn-block" type="submit">Se connecter</button>
          </div>
        </form>
        <hr class="invisible">
        <div class="or">Ou</div>
        <div class="form-group">
          <a href="{{ route('register') }}" class="btn btn-default btn-quirk btn-stroke btn-stroke-thin btn-block btn-sign">Vous n'avez pas de compte? Inscrivez vous!</a>
        </div>
      </div>
    </div><!-- panel -->
  
  </body>
@endsection