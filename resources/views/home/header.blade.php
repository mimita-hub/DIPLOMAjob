<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DiplomaJob</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/home/assets/img/d.jpg')}}" rel="icon">
  <link href="{{asset('assets/home/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/home/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/home/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/home/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/home/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/home/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/home/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/home/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/home/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Dewi - v4.7.0
  * Template URL: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top  ">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">DIPlOMAjob</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto @if(Request :: route()->getName() =='app_home')active } @endif " href="{{route('app_home')}}">Accueil</a></li>
          <li><a class="nav-link scrollto @if(Request :: route()->getName() =='app_formation')active } @endif " href="{{route('app_formation')}}">Formations</a></li>
         <li><a class="nav-link scrollto @if(Request :: route()->getName() =='app_competence')active } @endif "  href="{{route('app_competence')}}">Compétences</a></li>
          <li><a class="nav-link scrollto @if(Request :: route()->getName() =='app_metier')active } @endif " href="{{ route ('app_metier')}}">Métiers</a></li>
          <li><a class="nav-link scrollto @if(Request :: route()->getName() =='app_entreprise')active } @endif " href="{{ route ('app_entreprise')}}">Espace Entreprise</a></li>


            @if (Route::has('login'))
                @auth
                <li class="dropdown"><a  role="button" href="#" ><span> {{ Auth::user()->nom }}</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                  <li>
                        <a  href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Deconnecter') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @if (Auth::user()->type=="adminSys" ||Auth::user()->type== "univAdmin" ||Auth::user()->type== "respFaculte" ||Auth::user()->type== "respDepartement" ||Auth::user()->type== "respSpecialite" || Auth::user()->type=="responsable_rh" )
                    <li>
                    <a href="{{route('dash')}}">Dashboard</a>@endif
                </li>
            @else
            <li class="dropdown"><a href="#" >Mon Compte <i class="bi bi-chevron-down"></i></a>
               <ul>
              <li><a href="{{route('login')}}">Se Connecter</a></li>
              @if (Route::has('register'))
              <li><a href="{{route('choix')}}">S'inscrire</a></li>
              @endif
              @endauth

            </ul>
            @endif
          </li>


        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
