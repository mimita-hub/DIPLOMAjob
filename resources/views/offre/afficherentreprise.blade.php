@include('home.head')

<section class="emploiaffiche">
    <div class="emploiaff">
        <h1>{{$entreprise->nomEntreprise}}</h1>
        <h2><i class="bi bi-file-spreadsheet"></i> <span class="espace">{{$entreprise->secteur_entreprise}}</span>     <i class="bi bi-geo-alt-fill"></i> <span class="espace">{{$entreprise->lieu_entreprise}}</span>                  <i class="bi bi-envelope"></i> <span class="espace">{{$entreprise->adresse_mail_entreprise}}  </span>  <i class="bi bi-telephone"></i>  <span class="espace">{{$entreprise->téléphone}}</span></h2>
    </div>
</section>

<main id="main" class="mainemploi">
    <div class="affiche">
    <div class="definition">
        <h1>Qui  sommes nous!</h1>
        <br>
        <hr>
        <p>{{$entreprise->description_entreprise}}</p>
        <br>
     </div>

    <div class="affentreprise">
         <h1>Offres d'emploi</h1>




    @foreach ($entreprise->emplois as $emploi)
    <hr>
     <h2>{{$emploi->nompost}}</h2>
     <a href="{{route('app_afficheremploi',[$emploi->id,$emploi->entreprise_id])}}">
     <table>
        <thead>
            <tr>
                <th width="400px"><i class="bi bi-person-fill"></i>{{$emploi->nombrepost}}<span class="espace">postes ouverts</span></th>
                 <th width="400px" ><i class="bi bi-briefcase-fill"></i><span class="espace">{{ $emploi->experiencedemandée}} </span></th>

                 <th><i class="bi bi-geo-alt-fill"></i> <span class="espace">{{$emploi->lieu}}</span></th>
                </tr>
        </thead>
        <thead>
            <tr>
                <th>  <i class="bi bi-mortarboard-fill"></i><span class="espace">{{$emploi->niveaudétude}}</span></th>
                <th>   <i class="bi bi-file-spreadsheet"></i><span class="espace">{{$emploi->secteurdactivite}}</span>
                </th>
                <th><i class="bi bi-bookmark-fill"></i> <span>{{$emploi->typecontrat}}</span></th>

            </tr>
        </thead>
     </table>



    </a>
    <br>
     @endforeach
<br>


        </div>
        <div class="affentreprise">
            <h1>Offres de Stage</h1>

       <hr>
        @foreach ($entreprise->stages as $stage)
        <h2>{{$stage->nomstage}}</h2>


        <a href="{{route('app_afficherstage',[$stage->id,$stage->entreprise_id])}}">
            <table>
               <thead>
                   <tr>
                       <th width="400px"><i class="bi bi-person-fill"></i>{{$stage->nombrepost}}<span class="espace">postes ouverts</span></th>
                       <th><i class="bi bi-bookmark-fill"></i> <span>{{$stage->niveaupost}}</span></th>

                       <th><i class="bi bi-geo-alt-fill"></i> <span class="espace">{{$stage->lieu}}</span></th>

                       </tr>
               </thead>
               <thead>
                <tr>
                    <th>  <i class="bi bi-mortarboard-fill"></i><span class="espace">{{$stage->niveaudétude}}</span></th>
                    <th>   <i class="bi bi-file-spreadsheet"></i><span class="espace">{{$emploi->secteurdactivite}}</span></th>

                    <th>  <i class="bi bi-alarm-fill"></i><span class="espace">{{$stage->periode}}</span></th>


                </tr>
            </thead>
            </table>


            <hr>
           </a>


        @endforeach

</div>
    </div>
    <br>
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
