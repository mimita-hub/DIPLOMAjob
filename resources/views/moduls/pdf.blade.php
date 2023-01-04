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

  </header><!-- End Header -->

  <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
          <div class="container">

            <div class="d-flex justify-content-between align-items-center">
              <h2>Details Formation  {{$data->nomSpecialite}}</h2>
                </div>
            <div class="d-flex justify-content-between align-items-center">




              </ol>
            </div>
            <div class="d-flex justify-content-between align-items-center">
               <ol>

                    </ol>
            </div>

          </div>
        </section>

        <div class="container">
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">



            <div class="section-title">
              <h2>Description <i class="bx bx-file"></i>  </h2>
              {{$data->description }}

            </div>
            <div class="section-title">
                <h2>Objectifs <i class="bi bi-pin-angle-fill"></i> </h2>

                <?php
                $varTexteArea= str_replace('<br /> ', '<br/>', nl2br('-'.$data->objectifs ));
                echo $varTexteArea;
                ?></textarea>

            </div>
            <div class="section-title">
                <h2>Pré-Requis <i class="bi bi-card-checklist"></i></h2>
                <?php
                $varTexteArea= str_replace('<br /> ', '<br/>', nl2br('-'.$data->prerequis ));
                echo $varTexteArea;
                ?></textarea>
            </div>
            <div class="section-title">
                <h2>Secteurs Professionnels <i class="bi bi-briefcase-fill"></i></h2>
                <?php
                $varTexteArea= str_replace('<br /> ', '<br/>', nl2br('-'.$data->prerequis));
                echo $varTexteArea;
                ?></textarea>
            </div>

            <div class="section-title">
                <h2>Fiche semestrielle d'enseignements <i class="bi bi-calendar-week-fill"></i></h2>
                <br>
                <table class="table table-bordered table-light">
                    <thead>
                      <tr>

                         <th>Semestre</th>
                         <th>Module</th>
                         <th>Unite Enseignement</th>
                         <th>VH Cours</th>
                         <th>VH TD</th>
                         <th>VH Tp</th>
                         <th>VH semestre</th>
                         <th>Element Competence</th>


                      </tr>
                     </thead>
                     <?php $i=0;?>
                     <tbody>
                        @foreach ($semestre as $semestre )

                         @foreach ($module as $mod )
                         @if($mod->specialite_id==$data->id)
                         @if($semestre->module_id==$mod->id)
                     <tr>

                         <th> {{$semestre->code}}</th>
                         <th> {{$mod->titre}}</th>
                         <th> {{$mod->unite}}</th>
                         <th><?php if($mod->C==60)
                            echo '1h';
                          elseif ($mod->C==90) {
                            echo '1h30';
                          }elseif ($mod->C==120) {
                            echo '2h';
                          }elseif ($mod->C==150){
                            echo '2h30';
                          }elseif ($mod->C==180) {
                            echo '3h';
                          }elseif ($mod->C==0)

                          echo $mod->C."h" ; ?>
                          </th>
                      <th><?php if($mod->TD==60)
                        echo '1h';
                      elseif ($mod->TD==90) {
                        echo '1h30';
                      }elseif ($mod->TD==120) {
                        echo '2h';
                      }elseif ($mod->TD==150){
                        echo '2h30';
                      }elseif ($mod->TD==180) {
                        echo '3h';
                      }elseif ($mod->TD==0)

                      echo $mod->TD."h" ;
                      ?>
                      <th><?php if($mod->TP==60)
                        echo '1h';
                      elseif ($mod->TP==90) {
                        echo '1h30';
                      }elseif ($mod->TP==120) {
                        echo '2h';
                      }elseif ($mod->TP==150){
                        echo '2h30';
                      }elseif ($mod->TP==180) {
                        echo '3h';
                      }elseif ($mod->TP==0)

                      echo $mod->TP."h" ;
                      ?>
                         <th> {{$mod->vsh}}</th>
                         <th>  @foreach ( $mod->elementcompetences as $element )
                            <a href="{{route("element_details",$element->id)}}">{{$element->code}} </a></th>


                     </tr>
                     </tbody>@endforeach
                   @endif @endif
               @endforeach  @endforeach
                 </table>
            </div>
</div>


</section>

</div>

  </main>




</body>

</html>
