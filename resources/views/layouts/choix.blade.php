

 @include('home.header')

 <!-- ======= Hero Section ======= -->
 <section id="hero">
   <div class="hero-container" data-aos="fade-up" data-aos-delay="150">
     <h1 >Inscription </h1>
     <h2>Pour inscrire ,vous devez choisir votre catégorie</h2>
  <div class="d-flex">
    @if (Route::has('register'))
       <a href="{{route('registerETD') }}" class="btn-get-started scrollto">Etudiant</a> &nbsp; &nbsp; &nbsp;
       <a href="{{route('registerUNIV') }}" class="btn-get-started scrollto">Université</a> &nbsp; &nbsp; &nbsp;
       <a href="{{route('register') }}" class="btn-get-started scrollto">Entreprise</a>
      </div>
      @endif
   </div>
 </section><!-- End Hero -->


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


