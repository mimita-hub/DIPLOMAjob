@include('home.head')
<link href="{{asset('assets\rating.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>.color-99CC5B{background-color:#ff864e;}</style>
  <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
          <div class="container">

          </div>
        </section>

            <section id="services" class="services section-bg">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Feedbacks Formations</h2>
                        <p>{{$spec->nomSpecialite}}</p>
                      </div>

                      <div class="row" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($spec->feedbacks as $spec )
                        <div class="col-md-12">
                          <div class="icon-box">
                            @if($spec->user->type=="responsable_rh")

                            <span style="color:#ff864e "><?php echo "Entreprise";?></span>
                            @elseif ($spec->user->type=="etudiant")
                            <span style="color:#ff864e "><?php echo "Etudiant";?></span>

                            @endif
                            <h4><a href="#">{{$spec->user->nom}} </a>
                              @for($i=1; $i<=$spec->rating; $i++)
                            <span class="fa fa-star text-warning"></span>
                            @endfor</h4>
                            <p class="text-">{{$spec->user->created_at->format('d/m/y')}}</p>

                            <p>{{$spec->commentaire}}</div>
                        </div>
                        @endforeach
                      </div>
                </div>
            </section>

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
