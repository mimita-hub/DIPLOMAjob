
@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Profil Membre</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href={{route('dash')}}>Home</a></li>
          <li class="breadcrumb-item active"><a href="{{route('User.index')}}">Membres</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-8">



        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Details</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Informations Personnelles</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nom</div>
                    <div class="col-lg-9 col-md-8">{{$univ->nom}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Prenom</div>
                    <div class="col-lg-9 col-md-8">{{$univ->prenom}}</div>
                  </div>

              {{--    <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date de naissance</div>
                    <div class="col-lg-9 col-md-8">{{$univ->date_naissance}}</div>
                  </div>--}}

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Sexe</div>
                    <div class="col-lg-9 col-md-8">{{$univ->sexe}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Adresse</div>
                    <div class="col-lg-9 col-md-8">{{$univ->adresse}}</div>
                  </div>



                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{$univ->email}}</div>
                  </div>

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
