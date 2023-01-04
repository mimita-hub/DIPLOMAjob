@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>

        </h1>
        <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active"> Details Spécialité

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->

                <div class="tab-content pt-2">

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">

                        <h5 class="card-title">Compléter / Modifier Spécialité
                        </h5>
                        @foreach ($data as  $formation)
                        <a class="btn btn-primary" href="{{ route('specialites.edit',$formation->id) }}">Modifier</a>
                           @endforeach
<hr> <hr>
                        <h5 class="card-title">Details Spécialité
                        </h5>
                        @foreach ($data as  $formation)
<br><br>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label "> <strong>Nom</strong> </div>
                        <div class="col-lg-9 col-md-8">{{$formation->nomSpecialite}}</div>
                      </div>
                      <br>
                      <hr>
                      <br>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label"> <strong>Description</strong></div>
                        <div class="col-lg-9 col-md-8">{{$formation->description}}</div>
                      </div>
                      <br>
                      <hr>
                      <br>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label"> <strong>Objectifs</strong></div>
                        <div class="col-lg-9 col-md-8">  <?php
                            $varTexteArea= str_replace('<br /> ', '<br/>', nl2br($formation->objectifs ));
                            echo $varTexteArea;
                            ?></div>
                      </div>
                     <br>
                     <hr>
                     <br>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label"> <strong>Secteurs Professionnels</strong></div>
                        <div class="col-lg-9 col-md-8">  <?php
                            $varTexteArea= str_replace('<br /> ', '<br/>', nl2br($formation->secteurs ));
                            echo $varTexteArea;
                            ?></div>
                      </div>
                      <br>
                      <hr>
                      <br>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label"> <strong>Pré requis</strong></div>
                        <div class="col-lg-9 col-md-8">  <?php
                            $varTexteArea= str_replace('<br /> ', '<br/>', nl2br($formation->prerequis ));
                            echo $varTexteArea;
                            ?></div>
                      </div>
                      <div class="row">

                        <div class="col-lg-9 col-md-8"></div>

                      </div>

                      <br>
                      <hr>
                      <br>


                    </div>
                    @endforeach
                <!-- End Table with stripped rows -->
              </div>
            </div>

          </div>
        </div>
      </section>


  </main><!-- End #main -->


@include('adminDash.footerAD')

