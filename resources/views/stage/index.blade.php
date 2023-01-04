@include('home.header')
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h1> Stage</h1>

      <div class="d-flex">
        <a href="#about" class="btn-get-started scrollto">Commencer</a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main" class="mainemploi">
  <section id="about" class="about">
    <form action="{{route('stage_search')}}" method="GET" >

        <section  class="recherche">
        <h1>Chercher Stage</h1>
        <input type="search" placeholder="Mots clé"  name="recherchestage" >
    <button type="submit" name="submit" id="submit" > <i class="bi bi-search"></i>    Recherche</button>
       </section>
<br>
        <section  class="filtrestage">

        <h1>Filtrez par </h1>


        <hr>
        <br>
        <table>

        <thead>
        <tr>
        <th  width="800px"><h2>Métier/Fonction</h2></th>
        <th width="800px"><h2>Niveau d'étude(diplome)</h2></th>

         </tr>
        </thead>
       <tbody>
        <tr>
            <td>

                    <input type="search" placeholder="Métier/Fonction"  name="metier" >


            </td>
      <td>
        <select  name="nvetudere"  >
            <option selected>Niveau d'étude(diplome)</option>
            <option > Licence (LMD),BAC+3</option>
            <option >Master 1,Licence BAC+4</option>
            <option >Master 2,Ingniorat,BAC+5</option>
            <option >Doctorat</option>
            <option >Certification</option>
            <option >Formation Professionnelle</option>
        </select>
      </td>

        </tr>

       </tbody>



    </table>
     <br>
     <br>
    </section>
    </form>
   <br>
   <br>
   <div class="afficheemploi">
    <br>

 @foreach ($stages as $stage )
 <a href="{{route('app_afficherstage',[$stage->id,$stage->entreprise_id])}}"><i class="bi bi-box-arrow-up-right  right"></i> </a>
    <h1>{{$stage->nomstage}}</h1>
    <h3>{{$stage->nomentreprise}}</h3>
    <i class="bi bi-geo-alt-fill"></i> <span>{{$stage->lieu}}</span>   <i class="bi bi-bookmark-fill"></i>    <span>{{$stage->niveaupost}}</span> <i class="bi bi-clock-fill"></i> <span>{{$stage->periode}}</span> <i class="bi bi-mortarboard-fill"></i><span >{{$stage->niveaudétude}}</span>

       <hr>
 @endforeach
 @forelse ($stages as $stage )

 @empty
 <br>
     <p>Résultat Introuvable <strong>{{request()->query('search')}}</strong></p>
 @endforelse
</div>
<br>
<br>
</section>
    </form>

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

