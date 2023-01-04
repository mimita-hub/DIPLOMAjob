@include('home.head')

<!-- ======= Etablissement ======= -->
<section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-center ">
        <h2> Gestion des Universités </h2>

      </div>

    </div>
  </section>
    <div class="container">
     <section class="inner-page">
        <a href="{{route('Universite.index')}}" role="button" class="btn"> Ajouter Université</a></li>
      </section>
    </div>
    <!-- End etablissemnt-->
    <!-- ======= Filieres======= -->
    <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-center ">
        <h2 >Filiere</h2>

      </div>

    </div>
  </section>
    <div class="container">
     <section class="inner-page">
        <a href="{{route('filiere.index')}}" role="button" class="btn"> Ajouter Filiere</a></li>
        <a href="{{route('index')}}" role="button" class="btn"> admin</a></li>

      </section>
    </div>
    <!-- End etablissemnt-->

@endif
  </main>
@include('home.footer')

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
