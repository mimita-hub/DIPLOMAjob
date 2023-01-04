@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>

        </h1>
        <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active"> Details Métier

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->

                <div class="tab-content pt-2">

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">

                        <h5 class="card-title">Details Métier
                        </h5>


<br><br>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label "> <strong>Titre</strong> </div>
                        <div class="col-lg-9 col-md-8">{{$metiers->titre}}</div>
                      </div>
                      <br>
             <hr>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label"> <strong>Description</strong></div>
                        <div class="col-lg-9 col-md-8">{{$metiers->description}}</div>
                      </div>
                      <br>
<hr>



                      @foreach ($metiers->missions as  $mission)
                       <div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label"> <strong>Missions</strong></div>

                        {{$mission->description}}
                      </div>
                      <br>
                      @foreach ($mission->competences as  $competence)

                     <div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label"> <strong>Compétences</strong></div>
                       {{$competence->intitule}}
                      </div>
                      <br>
                      @foreach ($competence->elementcompetences as  $element)

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label"> <strong>Eléments de compétence</strong></div>
                        {{$element->intitule}}
                      </div>
                      </div>
                    </div> <br>

                      <br>
                      <hr>
                      <br>
                      @endforeach
                      @endforeach
                      @endforeach




                <!-- End Table with stripped rows -->
              </div>
            </div>

          </div>
        </div>
      </section>


  </main><!-- End #main -->


@include('adminDash.footerAD')

