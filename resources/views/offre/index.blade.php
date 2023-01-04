@include('home.header')
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h1> Trouvez votre futur emploi</h1>

      <div class="d-flex">
        <a href="#about" class="btn-get-started scrollto">Commencer</a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main" class="mainemploi">
  <section id="about" class="about">
    <form action="{{route('offre.index')}}" method="GET" >

        <section  class="recherche">
        <h1>Chercher Emploi</h1>
        <input type="search" placeholder="Mots clé"  name="rechercheemploi" >
    <button type="submit" name="submit" id="submit" > <i class="bi bi-search"></i>    Recherche</button>
       </section>
       <br>
        <section  class="filtre">

        <h1>Filtrez par </h1>


        <hr>
        <br>
        <table>

        <thead>
        <tr>
         <th  width="800px"><h2>Métier/Fonction</h2></th>
         <th width="800px"><h2>Niveau de post</h2></th>
         </tr>
        </thead>
       <tbody>
        <tr>
            <td>
                <input type="search" placeholder="Métier/Fonction"  name="metier" >


            </td>
            <td><select   name="nvpostrecherche" >
                <option selected>Niveau de post</option>
                <option>Débutant/Junior</option>
                <option>Jeune diplomé</option>
                <option>Confirmé/Expérimenté</option>
                <option>Responsable équipe</option>
                <option>Manager/Responsable département</option>
                <option >Cadre dirigeant</option>
            </select></td>
        </tr>

       </tbody>

       <thead>
        <tr>
         <th width="800px"><h2>Experience demandée</h2></th>
         <th width="800px"><h2>Niveau d'étude(diplome)</h2></th>
        </tr>
       </thead>
       <tbody>
        <tr>
            <td>
                <select  name="experiencere"  >
                    <option selected>Experience demandée</option>
                    <option > Sans expérience</option>
                    <option >Moins  an </option>
                    <option >1 à 2 ans </option>
                    <option >3 à 5 ans </option>
                    <option >6 à 10 ans </option>
                    <option >plus à 10 ans </option>
                </select>
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
                    <option >Universitaire sans diplome</option>
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
<div class="afficheemploi">
    <br>

 @foreach ($data as $emploi )
 <a href="{{route('app_afficheremploi',[$emploi->id,$emploi->entreprise_id])}}"><i class="bi bi-box-arrow-up-right  right"></i> </a>
    <h1>{{$emploi->nompost}}</h1>

    <h3>{{$emploi->nomentreprise}}</h3>
    <i class="bi bi-geo-alt-fill"></i> <span>{{$emploi->lieu}}</span>   <i class="bi bi-bookmark-fill"></i>    <span>{{$emploi->niveaupost}}</span> <i class="bi bi-briefcase-fill"></i> <span>{{$emploi->experiencedemandée}}</span><i class="bi bi-bookmark-fill"></i> <span>{{$emploi->typecontrat}}</span> <i class="bi bi-clock-fill"></i> <span>{{$emploi->datedexpiration}}</span>

       <hr>
 @endforeach

 @forelse ($data as $emploi )

 @empty
 <br>
     <p>Résulta Introuvable <strong>{{request()->query('search')}}</strong></p>
 @endforelse

</div>
<br>
<br>
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

