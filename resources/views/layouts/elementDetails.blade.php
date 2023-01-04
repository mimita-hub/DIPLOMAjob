@include('home.head')

  <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
          <div class="container">

            <div class="d-flex justify-content-between align-items-center">
              <h2>Details Element</h2>
              <ol>

                <li><a href="{{route('app_formation')}}">Formation</a></li>




                <li>   {{$data->nomSpecialite}}</li>
                <li><a>{{$data->departement->faculte->universite->nom_universite}}</a></li>
              </ol>
            </div>


            <div class="d-flex justify-content-between align-items-center">
              <h6> </h6>
              <ol>
                <style>.color-99CC5B{background-color:#ff864e;}</style>

                <li><a href="{{route('formation_details',$data->id)}}">
                    <i class="bi bi-arrow-left-circle-fill"></i>  Retour </a>
                </li>

              </ol>
            </div>

          </div>
        </section>

        <div class="container">
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">




            <div class="section-title">
                <h2>Details Element De competence<i class="bx bx-fill"></i></h2>
                <br>
                <table class="table table-bordered table-light">
                    <thead>
                      <tr>

                         <th>code</th>
                         <th>intitule</th>
                         <th> code competence</th>
                         <th>competence</th>

                         <th>Metier</th>


                      </tr>
                     </thead>
                     <?php $i=0;?>
                     <tbody>


                     <tr>

                         <th> {{$element->code}}</th>
                         <th> {{$element->intitule}}</th>
                         <th> {{$element->competence->code}}</th>
                         <th> {{$element->competence->intitule}}</th>


                         <th> {{$metier->titre}}</th>


                     </tr>
                     </tbody>


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
