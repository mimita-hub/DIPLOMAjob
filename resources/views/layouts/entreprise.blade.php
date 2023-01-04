@include('home.header')
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h1> Espace Entreprise</h1>

      <div class="d-flex">
        <a href="#features" class="btn-get-started scrollto">Commencer</a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <section id="features" class="features">
    <div class="affrec">
        <div class="zone1">
            <i class="bi bi-briefcase-fill icon"></i>
            <br>
            <span class="title1">Emploi</span>
            <p>Du contenu des formations au développement d’un réseau d’entreprises, notre mission n’a de sens que si nos étudiants (re)trouvent un emploi rapidement à l’issue de leur formation</p>
        </div>
        <div class="zone2">
            <i class="bi bi-award-fill icon2 "></i>

              <span class="title2">Professionnels </span>
           <p>Nous nous remettons en cause à chaque formation pour être en phase avec les besoins du marché</p>
          </div>


          </div>


        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div >

    <div class="button">

        @auth
        @if(Auth::user()->type=="responsable_rh")


        <a href="{{route('metiers.create')}}" class="active">Ajouter Nouveau Métier</a>
        <a href="{{route('offre.create')}}">Ajouter Offre Emploi</a>
        <a href="{{route('stages.create')}}">Ajouter Offre Stage</a>
        @endauth
        @else
        <a href="{{route('choix')}}" class="active">Ajouter Nouveau Métier</a>
        <a href="{{route('choix')}}">Ajouter  Offre Emploi</a>
        <a href="{{route('choix')}}">Ajouter Offre Stage</a>
        @endif
        <a href="{{route('app_metier')}}">Afficher les Métiers</a>
        <a href="{{route('offre.index')}}">Afficher les Offres Emplois</a>
        <a href="{{route('stages.index')}}">Afficher les Offres Stages</a>

    </div>
</div>

      <form action="{{route('entreprise_search')}}" method="GET" >
      <section class="filtrentreprise">
       <div class="chercher">
        <h1>Trouvez l'entreprise qui vous correspond</h1>
        <br>
        <table>
            <thead>
                <tr>
                    <th width="500px">  <input type="search" placeholder="Mots clé,nom de l'entreprise..." class=" @error('entreprise') is-invalid @enderror" name="entreprisecherche"></th>
                         <th width="500px"> <input type="search" placeholder="Secteur d'activité" class=" @error('secteurcherche') is-invalid @enderror" name="secteurcherche" ></th>
                    <th width="500px">        <button type="submit" name="submit" id="submit" > <i class="bi bi-search"></i>    Recherche</button>
                    </th>
                </tr>

            </thead>
        </table>


       </div>
    </form>
       <br>
       <div class="affichentreprise">
        <br>

        @foreach ($entreprises as $entreprise )
  <a href="{{route('app_entrepriseaffichage',$entreprise->id)}}"> <i class="bi bi-box-arrow-up-right  right"></i></a>

        <br>
        <h1>{{$entreprise->nomEntreprise}}</h1>
        <br>
         <p>{{$entreprise->description_entreprise}}</p>
         <br>
         <i class="bi bi-geo-alt-fill"></i><span class="espace">{{$entreprise->lieu_entreprise}}</span> <i class="bi bi-file-spreadsheet"></i><span class="espace">{{$entreprise->secteur_entreprise}}</span>  <i class="bi bi-envelope"></i> <span class="espace">{{$entreprise->adresse_mail_entreprise}}  </span>  <i class="bi bi-telephone"></i>  <span class="espace">{{$entreprise->téléphone}}</span>
        <hr>

        @endforeach
      @forelse ($entreprises as $entreprise )

      @empty
         <p class="alert alert-danger"> <strong> {{request()->query('search')}}</strong>   introuvable </p>
     @endforelse
    </div>

</section>
</section>
<br>
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
