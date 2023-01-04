@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Université</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</a></li>
          <li class="breadcrumb-item">  <a  href="{{route('Universite.index')}}" >  Université</a> </a>

           </li>
          <li class="breadcrumb-item active">Details Université</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Details Université:{{$univ->nom_universite}} </h5>
                    <div class="col-10">

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label "><strong> Nom </strong></div>
                        <div class="col-lg-9 col-md-8">{{$univ->nom_universite}}</div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label"><strong> Adresse mail </strong></div>
                        <div class="col-lg-9 col-md-8">{{$univ->adr_mail}}</div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label"><strong> Description </strong></div>
                        <div class="col-lg-9 col-md-8">{{$univ->description}}</div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label"><strong> date Inscription</strong></div>
                        <div class="col-lg-9 col-md-8">{{$univ->user->created_at}}</div>
                      </div>
                      <hr>

                      <h5 class="card-title">Informations de Responsable De cette universite: </h5>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label"><strong> Nom Responsable </strong></div>
                        <div class="col-lg-9 col-md-8">{{$univ->user->nom}}</div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label"><strong> Adresse mail</strong></div>
                        <div class="col-lg-9 col-md-8">{{$univ->user->email}}</div>
                      </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
      </section>


  </main><!-- End #main -->


@include('adminDash.footerAD')

