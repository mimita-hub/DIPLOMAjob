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
       <link rel="stylesheet" href="{{ asset('assets/Register/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
       <!-- Main css -->
            <link rel="stylesheet" href="{{ asset('assets/Register/css/style.css')}}">
             <!-- Bootstrap CSS -->
             <link rel="stylesheet" href="{{ asset('assets/Login/css/bootstrap.min.css')}}">

            <link href="{{asset('assets/home/assets/css/style.css')}}" rel="stylesheet">

    </head>
    <body class="auth_class">
        @include('sweetalert::alert')
        <div class="container login-container">
               <div class="row">
            <div class="col-md-6 welcome_auth">
                <div class="auth_welcome">
                   DiplomaJob <br>
                </div>
            </div>
            <div class="col-md-6 login-form">
                <div class="login_form_in">
                    <div class="auth_branding">
                  <h1 class="auth_title text-left text-center">
                   <strong> S'inscrire </strong> |<span>Université</span></h1>
                   <form method="POST" class="register-form"  action="{{route('register')}}">
                      @csrf
                              {{--  Entreprise info  --}}
                              <h5 class="auth_title text-left text-center">
                              <span>   Informations Université </span></h5>

                              <div class="form-group">
                                <input placeholder="Université" id="nom_universite" type="text" class="form-control @error('nom_universite') is-invalid @enderror" name="nom_universite" value="{{ old('nom_universite') }}" required autocomplete="nom_universite" autofocus>
                                @error('nom_universite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             </div>

            <div class="form-group">
            <textarea class="form-control" name="description" rows="3" placeholder="Description" required></textarea>
           </div>

            <div class="form-group">

                <input placeholder="Email Université" id="email" type="email" class="form-control @error('adr_mail') is-invalid @enderror" name="adr_mail" value="{{ old('adr_mail') }}" required autocomplete="adr_mail">

                @error('adr_mail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

             </div>
            <hr>
            <h5 class="auth_title text-left text-center">
            <span>   Informations personnelles </span></h5>

                     {{-- informations personnelles--}}
                    <div class="form-group">
                        <input placeholder="Nom" id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>
                         @error('nom')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                       </div>
                       <div class="form-group">
                         <input placeholder="Prénom" id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>
                            @error('prenom')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                     </div>
                     <div class="form-radio">
                        <label for="sexe" >{{__('Sexe')}}: </label>
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
            <div class="form-group">

                 <input placeholder="Adresse" id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse" autofocus>

                 @error('adresse')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror

              </div>
              <div class="form-group" hidden>
                 <label for="type" >{{ __('type') }}</label>
                  <input id="type" type="text" class="form-control" name="type" value="univAdmin" required autocomplete="type" autofocus>

               </div>
             <div class="form-group">

                <input id="date_naissance" type="date" class="form-control @error('date_naissance') is-invalid @enderror" name="date_naissance" value="{{ old('date_naissance') }}" required autocomplete="date_naissance" autofocus>

                @error('date_naissance')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror

              </div>
             <div class="form-group">

                 <input placeholder="Email*" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                 @error('email')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror

              </div>

             <div class="form-group">

                 <input placeholder="Mot de passe "  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                 @error('password')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror

             </div>

             <div class="form-group">

                 <input placeholder="Confirmez votre mot de passe" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
             </div>
                    <div class="form-group">
                        <input type="submit" value="Inscription" class="submit" name="submit" id="submit" />
                    </div>

                  </form>
                </div>
            </div>
          </div>
        </div>

         </body>

</html>


















{{--<!DOCTYPE html>
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
                    <div class="form-row">
                        <label for="date_naissance"> {{_('Date De Naissance')}}</label><br>
                         <input id="date_naissance" type="date" class="form-control @error('date_naissance') is-invalid @enderror" name="date_naissance" value="{{ old('date_naissance') }}" required autocomplete="date_naissance" autofocus>

                         @error('date_naissance')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                         @enderror

                       </div>
                    <div class="form-group " hidden>
                        <label for="type" >{{ __('type') }}</label>
                         <input id="type" type="text" class="form-control" name="type" value="univAdmin" required autocomplete="type" autofocus>

                      </div>
                      <hr><br>

                             <div class="form-group">
                                <label for="nom_universite" >{{ __('Nom universite') }}</label>
                                 <input id="nom_universite" type="text" class="form-control @error('nom_universite') is-invalid @enderror" name="nom_universite" value="{{ old('nom_universite') }}" required autocomplete="nom_universite" autofocus>

                                 @error('nom_universite')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror

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
                                <label for="adr_mail" >{{ __('adr mail université') }}</label>
                                 <input id="adr_mail" type="email" class="form-control @error('adr_mail') is-invalid @enderror" name="adr_mail" value="{{ old('adr_mail') }}" required autocomplete="adr_mail" autofocus>

                                 @error('adr_mail')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror

                              </div>
                              <div class="form-group ">
                                <label class="col-sm-4 control-label">Description</label>
                                <div class="col-sm-9">
                                 <textarea class="form-control" name="description" rows="" placeholder="ecrire" required></textarea>
                                </div>
                            </div>

<br>
                          <hr>
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


--}}
