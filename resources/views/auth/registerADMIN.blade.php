<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insecription</title>
     <!-- Font Icon -->
     <link rel="stylesheet" href="{{ asset('assets/Register/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
         <!-- Main css -->
              <link rel="stylesheet" href="{{ asset('assets/Register/css/style.css')}}">
</head>
<body>
<div class="main">
    <div class="container">

         <div class="signup-form">
            <form method="POST" class="register-form"  action="{{route('register')}}">
              @csrf
              <h2> {{__('Formulaire D\'inscription')}}</h2>
              <div class="form-row">
                    <div class="form-group">
                      <label for="nom" >{{ __('Nom') }}</label>
                      <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>
                       @error('nom')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                         </span>
                      @enderror
                     </div>
                      <div class="form-group">
                         <label for="prenom" >{{ __('Prenom') }}</label>
                          <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>
                             @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                    </div>
                    <div class="form-group">
                    <label for="date_naissance"> {{_('Date De Naissance')}}</label><br>
                    <input id="date_naissance" type="date" class="form-control @error('date_naissance') is-invalid @enderror" name="date_naissance" value="{{ old('date_naissance') }}" required autocomplete="date_naissance" autofocus>

                    @error('date_naissance')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                    @enderror

                  </div>
                   <div class="form-radio">
                                <label for="sexe" >{{__('Sexe')}} : </label>&nbsp;
                                <div class="form-radio-item">
                                    <input type="radio" name="sexe" id="homme"  value="homme"checked>
                                    <label for="homme">Homme</label>
                                    <span class="check" value="homme"></span>
                                </div>
                                <div class="form-radio-item">
                                    <input type="radio" name="sexe"  value="femme" id="femme">
                                    <label for="femme" >Femme</label>
                                    <span class="check" value="femme"></span>
                               </div>
                                @error('sexe')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                    </div>
                    <div class="form-group " hidden>
                        <label for="type" >{{ __('type') }}</label>
                         <input id="type" type="text" class="form-control" name="type" value="admin_sys" required autocomplete="type" autofocus>

                      </div>


                            <div class="form-group">
                               <label for="adresse" >{{ __('Adresse') }}</label>
                                <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse" autofocus>

                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                             </div>





                            <div class="form-group">
                               <label for="email">{{ __('Email Address') }}</label>


                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                             </div>

                            <div class="form-group">
                              <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                               <label for="password-confirm" >{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                        <div class="form-submit">
                            <input type="submit" value="Enregistrer" class="submit" name="submit" id="submit" />
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

    <script src="{ { asset('assets/Register/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{ { asset('assets/Register/js/main.js')}}"></script>

</html>


