@include('home.head')

  <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
          <div class="container">

            <div class="d-flex justify-content-between align-items-center ">
              <h2>Details Formation</h2>
              <ol>
                <li><a class= "formation"href="{{route('app_formation')}}">Formation</a></li>



                <li>{{$data->nomSpecialite}}</li>
                <li><a>{{$data->departement->faculte->universite->nom_universite}}</a></li>
              </ol>
            </div>
            <div class="d-flex justify-content-between align-items-center telecharger">
              <h6>Donnez votre avis sur cette Formation</h6>
              <ol>
                @auth
                @if(Auth::user()->type=="etudiant" ||Auth::user()->type=="responsable_rh"  )
                <li><a href="{{route('create_feed',$data->id)}}">
                  Evaluer <i class="bi bi-chat-left-dots-fill"></i></a>
                </li>
                @endauth
                  @else
                  <li><a href="{{route('choix')}}">
                    Evaluer <i class="bi bi-chat-left-dots-fill"></i></a>
                  </li>

                @endif
              </ol>
            </div>
            <div class="d-flex justify-content-between align-items-center telecharger">
              <h6>Télecharger la fiche  </h6>
              <ol>
                <style>.color-99CC5B{background-color:#ff864e;}</style>


                <li><a href="{{route('pdf',$data->id)}}" >

                  Télecharger<i class="bi bi-file-pdf-fill"></i></a></li>
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

                         <td> {{$semestre->code}}</td>
                         <td> {{$mod->titre}}</td>
                         <td> {{$mod->unite}}</td>
                         <td><?php if($mod->C==60)
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
                          </td>
                      <td><?php if($mod->TD==60)
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
                      <td><?php if($mod->TP==60)
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
                      </td>
                         <td> {{$mod->vsh}}</td>
                         <td>  @foreach ( $mod->elementcompetences as $element )
                            <a href="{{route("element_details",$element->id)}}">{{$element->code}} </a>
                            @endforeach
                        </td>


                     </tr>
                     </tbody>
                   @endif @endif
               @endforeach  @endforeach
                 </table>
            </div>
</div>


</section>

</div>

  </main>
 @include('home.footer')
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/home/assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('assets/home/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/home/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/home/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/home/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/home/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/home/assets/js/main.js')}}"></script>



</body>

</html>
