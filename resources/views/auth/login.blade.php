<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
       <link href="{{asset('assets/Register/reset.css')}}" rel="stylesheet">
       <link rel="stylesheet" href="{{ asset('assets/Login/css/style.css')}}">
       <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('assets/Login/fonts/icomoon/style.css')}}">

<link rel="stylesheet" href="{{ asset('assets/Login/css/owl.carousel.min.css')}}">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('assets/Login/css/bootstrap.min.css')}}">

    </head>
    <body class="auth_class">
        @include('sweetalert::alert')
        <div class="container login-container">
               <div class="row">
            <div class="col-md-6 welcome_auth">
                <div class="auth_welcome">
                   DiplomaJob
                </div>
            </div>
            <div class="col-md-6 login-form">
                <div class="login_form_in">
                    <div class="auth_branding">

                  <h1 class="auth_title text-left">Se Connecter</h1>
                  <form action="{{ route('login')}}" method="POST">
                    @csrf



                    <div class="form-group">
                        <label for="email">{{ __('Addresse_Email') }} </label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('Mot De Passe') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror </div>


                    </div>
                    <div class="form-group">
                        <label class="control control--checkbox mb-0"><span class="caption">{{ __('Souviens de moi')}}</span>
                            <input type="checkbox" checked="checked" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <div class="control__indicator"></div>
                          </label>
                          @if (Route::has('password.request'))
                          <span class="ml-auto">
                          <a  class="forgot-pass" href="{{ route('password.request') }}">
                              {{ __('Mot de passe oublié') }}
                          </a> </span>
                      @endif
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Connexion" class="btn btn-block btn-primary"> </div>

                  </form>
                </div>
            </div>
          </div>
        </div>

         </body>

</html>










{{--@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}
{{--<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('assets/Login/fonts/icomoon/style.css')}}">

<link rel="stylesheet" href="{{ asset('assets/Login/css/owl.carousel.min.css')}}">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('assets/Login/css/bootstrap.min.css')}}">

<!-- Style -->
<link rel="stylesheet" href="{{ asset('assets/Login/css/style.css')}}">

<title>Se connecter</title>
</head>
<body>


<div class="d-lg-flex half">
<div class="bg order-1 order-md-2" style="background-image: url({{asset('assets/Login/images/bg_1.jpg')}})"></div>
<div class="contents order-2 order-md-1">

  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-7">
        <h3>Se Connecter <strong>DiplomaJob</strong></h3>
        <h2></h2>
        <p class="mb-4"></p>
        <form action="{{ route('login')}}" method="POST">
            @csrf
         <div class="form-group first">
            <label for="email">{{ __('Addresse_Email') }} </label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror </div>

          <div class="form-group last mb-3">
            <label for="password">{{ __('Mot De Passe') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror </div>


          <div class="d-flex mb-5 align-items-center">
            <label class="control control--checkbox mb-0"><span class="caption">{{ __('Souviens de moi')}}</span>
              <input type="checkbox" checked="checked" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <div class="control__indicator"></div>
            </label>
            @if (Route::has('password.request'))
            <span class="ml-auto">
            <a  class="forgot-pass" href="{{ route('password.request') }}">
                {{ __('Mot de passe oublié') }}
            </a> </span>
        @endif
          </div>

          <input type="submit" value="Connexion" class="btn btn-block btn-primary">

        </form>
      </div>
    </div>
  </div>
</div>


</div>


<script src="{{asset('assets/Login/js/jquery-3.3.1.min.js')}} "></script>
<script src="{{asset('assets/Login/js/popper.min.js')}}"></script>
<script src="{{asset('assets/Login/js/bootstrap.min.j')}}"></script>
<script src="{{asset('assets/Login/js/main.j')}}"></script>

</body>
</html>



{{--
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}
