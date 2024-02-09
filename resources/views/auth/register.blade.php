

@extends('layouts.app')

@section('content')
<body class="signwrapper">

    <div class="sign-overlay"></div>
    <div class="signpanel"></div>
  
    <div class="panel signin">
      <div class="panel-heading">
        <h1>{{ env('APP_NAME')}}</h1>
        <h4 class="panel-title">Bienvenue! Inscrivez vous.</h4>
        
      </div>
      <div class="panel-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf
          <div class="form-group mb10">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input type="text" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" name="name" value="{{old('name')}}" required autofocus autocomplete="username" placeholder="Enter Username">
              @error('name')
              <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
          </div>
          <div class="form-group mb10">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input type="email" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" name="email" value="{{old('email')}}" required autofocus autocomplete="email" placeholder="Enter Email">
              @error('email')
              <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
          </div>
          <div class="form-group mb10">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" name="password" required autocomplete="current-password"  class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}" placeholder="Enter Password">
              @error('password')
              <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
          </div>
          <div class="form-group mb10">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" name="password_confirmation" required class="form-control {{ $errors->has('password_confirmation') ? 'border-danger' : '' }}" placeholder="Confirm Password">
              @error('password_confirmation')
              <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-success btn-quirk btn-block" type="submit">S'inscrire</button>
          </div>
        </form>

        <div class="or">Ou</div>
        <div class="form-group">
          <a href="{{ route('login') }}" class="btn btn-default btn-quirk btn-stroke btn-stroke-thin btn-block btn-sign">Se connecter</a>
        </div>
      </div>
    </div><!-- panel -->
  
  </body>
@endsection