
@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
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
              <h3>{{ Auth::user()->type }}</h3>
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
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Modifier Mon Profil</button>
                  </li>

              </ul>

                <form  method="post"  action="{{ route('UpdateProfil')}}">
                    @csrf
                    @method('PUT')
                       <?php $user=Auth::user();?>
                       <br>

                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="nom" type="text" class="form-control" id="fullName" value="{{ $user->nom}}">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Prénom</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="prenom" type="text" class="form-control" id="fullName" value="{{ $user->prenom}}">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="date_naissance" class="col-md-4 col-lg-3 col-form-label">Date Naissance</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="date_naissance" type="date" class="form-control" id="date_naissance" value="{{ $user->date_naissance}}">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Adresse</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="adresse" type="text" class="form-control" id="Address" value="{{ $user->adresse}}">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="email" type="email" class="form-control" id="Email" value="{{ $user->email}}">
                        </div>
                      </div>  <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label"> Mot de passe</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="password" type="password" class="form-control" id="Password"  value="{{ $user->password}}">
                        </div>
                      </div>



                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                      </div>
                    </form><!-- End Profile Edit Form -->

                  </div>







                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

@include('adminDash.footerAD')
