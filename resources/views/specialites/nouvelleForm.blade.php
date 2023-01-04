@include('home.header')
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h1> Ajouter  Nouvelle Formation </h1>

      <div class="d-flex">
        <a href="#about" class="btn-get-started scrollto">Commencer</a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <section id="about" class="about">
    <div class="container">
        <br>
        <div class="section-title">

            <br>
           <h1 class="text-center"> Nouvelle Formation:</h1>
          <form action="">
            <br>
           <h2>Métier</h2>
           <input  class="form form-control-plaintext"type="text"  placeholder="entrez le métier">
           </div>
          <div class="section-title">
        <h2>Compétences </h2>

         <input  class="form form-control-plaintext"type="text"  placeholder="entrez la Compétence">
        </div>
        <div class="section-title">
        <h2> Eléments De Compétence </h2><br>
        <input  class="form form-control-plaintext"type="text"  placeholder="entrez  l'elément de Compétence">
        <input  class="form form-control-plaintext"type="text"  placeholder="entrez  l'elément de Compétence">
        <input  class="form form-control-plaintext"type="text"  placeholder="entrez  l'elément de Compétence">
       </div>
       <style>.color-99CC5B{background-color:#ff864e;}</style>


       <button class="btn  color-99CC5B" type="button">Ajouter</button>
     </form>
      <br>
    </form>

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
