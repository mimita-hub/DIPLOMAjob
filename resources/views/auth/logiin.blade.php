<!doctype html>
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
        <h3>Se Connecter<strong>DiplomaJob</strong></h3>
        <p class="mb-4"></p>
        <form action="{{ route('logiin')}}" method="POST">
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

