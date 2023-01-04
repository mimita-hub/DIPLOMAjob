
@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Profil</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Profil</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <img src="{{asset('assets/admin/assets/img/prof.jpg')}}" alt="Profile" class="rounded-circle">

              <h2>{{ Auth::user()->nom }}</h2>
              <h3><?php
               if (Auth::user()->type =="respSpecialite")
               {
                echo " Responsable Spécialité";
                               }elseif(Auth::user()->type =="respFaculte") {
                                echo " Responsable Faculté" ;
                               }elseif (Auth::user()->type =="respDepartement") {
                                echo " Responsable Departement";
                               } elseif (Auth::user()->type =="univAdmin") {
                                echo " Administrateur Université";
                               }elseif (Auth::user()->type =="adminSys") {
                                echo " Administrateur Systeme";
                               }
                               elseif (Auth::user()->type =="responsable_rh") {
                                echo " Responsable RH";
                               }
                               elseif (Auth::user()->type =="etudiant") {
                                echo " Etudiant";
                               }
               ?></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Details</button>
                </li>
                <li class="nav-item">
                     </li>
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Informations Personnelles</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nom</div>
                    <div class="col-lg-9 col-md-8">{{Auth::user()->nom}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Prénom</div>
                    <div class="col-lg-9 col-md-8">{{Auth::user()->prenom}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date de naissance</div>
                    <div class="col-lg-9 col-md-8">{{Auth::user()->date_naissance}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Sexe</div>
                    <div class="col-lg-9 col-md-8">{{Auth::user()->sexe}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Adresse</div>
                    <div class="col-lg-9 col-md-8">{{Auth::user()->adresse}}</div>
                  </div>



                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{Auth::user()->email}}</div>
                  </div>

                </div>

                <?php  $user=Auth::user();?>

                <a class="btn btn-primary" href="{{ route('ModifierProfil',$user) }}"> Modifier    <i class="bi bi-pencil-square"></i></a>



                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

@include('adminDash.footerAD')
