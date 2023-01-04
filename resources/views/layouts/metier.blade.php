@include('home.header')
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h1>NOS FICHES MÉTIERS </h1>
      <h2>DU WEB, DU DIGITAL, DE LA CYBERSECURITÉ, DE l'INFORMATIQUE <br> DU BIG DATA ET DU SALES MARKETING !</h2>
      <div class="d-flex">
        <a href="#features" class="btn-get-started scrollto">Commencer</a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main"class="mainemploi">
    <section id="features" class="features">
    <br>
    <br>
    <form action="{{route('metier_search')}}" method="GET" >
    <section id="about" class="abouterecherche">

            <h1>Chercher Métier</h1>
            <input type="search" placeholder="Mots clé,métier,competence" class=" @error('entreprise') is-invalid @enderror" name="cherche" >
            <button type="submit" name="submit" id="submit" > <i class="bi bi-search"></i>    Recherche</button>

    </section>
    </form>
        <br>
        <div class="affichemetier">

         @foreach ($metiers as $metier )

      <br>
      <a href="{{route('app_detail',$metier->id)}}"><i class="bi bi-box-arrow-up-right  right"></i> </a>
            <h1>{{$metier->titre}}</h1>


        <p>{{$metier->description}}</p>
        <hr>
         @endforeach
         @forelse ($metiers as $metier )

         @empty
         <br>
             <p class="alert alert-danger"><strong>{{request()->query('search')}} </strong> Introuvable </p>
         @endforelse
        </div>


<br>
<br>


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
  <script src="{{asset('assets/home/assets/js/metier.js')}}"></script>


</body>

</html>
