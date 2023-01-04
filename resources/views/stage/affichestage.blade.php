@include('home.head')

<section class="emploiaffiche">
    <div class="emploiaff">
        <h1>{{$entreprise->nomEntreprise}}</h1>
        <h2><i class="bi bi-file-spreadsheet"></i> <span class="espace">{{$entreprise->secteur_entreprise}}</span>     <i class="bi bi-geo-alt-fill"></i> <span class="espace">{{$entreprise->lieu_entreprise}}</span> <i class="bi bi-envelope"></i> <span class="espace">{{$entreprise->adresse_mail_entreprise}}  </span>  <i class="bi bi-telephone"></i>  <span class="espace">{{$entreprise->téléphone}}</span></h2>
    </div>
</section>
<div class="lienaff">

    <nav id="navbar" class="navbar-emploi">
        <ul>
            <li><a class="nav-link scrollto @if(Request :: route()->getName() =='app_entrepriseaffichage')active } @endif " href="{{route('app_entrepriseaffichage',$stage->entreprise_id)}}">Entreprise</a></li>

          <li><a class="nav-link scrollto @if(Request :: route()->getName() =='app_home')active } @endif " href="{{route('app_home')}}">Offre de stage</a></li>

          </ul>
          </nav>
</div>



<main id="main" class="mainemploi">
    <div class="affiche">
    <div class="affemploi">
        <h1>{{$stage->nomstage}}</h1>
        <br>
        <hr>
    <div class="info">



    <table>

        <thead>
            <tr>
                <th width="500px"><span class="titre">Secteur d'activité</span></th>
                <th width="500px"><span class="titre">Nombre de post</span></th>


            </tr>
            </thead>
            <tbody>
                <tr>

                    <td><span class="parg">{{$stage->secteurdactivite}} </span></td>
                    <td><span class="parg"> {{$stage->nombrepost}}</span></td>



                </tr>
                </tbody>
                <br>
                <thead>
                    <tr>
                        <th width="700px"><span class="titre">Niveau de post</span></th>
                        <th width="500px"> <span class="titre">Métier/Fonction</span> </th>


                    </tr>
                    </thead>
                    <tbody>
                        <tr>

                         <td><span class="parg"> {{$stage->niveaupost}}</span></td>
                         <td><span class="parg"> {{$stage->nommetier}}</span></td>

                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th width="700px"><span class="titre">Lieu de travail</span></th>
                            <th width="500px"> <span class="titre">La durée de stage</span> </th>


                        </tr>
                        </thead>

                        <tbody>
                            <tr>

                                <td><span class="parg">{{$stage->lieu}}</span></td>
                                <td><span class="parg">{{$stage->periode}}</span></td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th width="700px"><span class="titre">Niveau d'étude</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="parg">{{$stage->niveaudétude}}</span></td>
                            </tr>
                        </tbody>


    </table>

    <hr>
    <h2>Mission</h2>
    @foreach ( $stage->missionstages as $mission  )
    <i class="bi bi-circle-fill"></i><span class="parghraphe">{{$mission->description}}</span>
    <br>
    @endforeach
    <br>
    <hr>


    <h2>Profile</h2>
    @foreach ( $stage->profilstages as $profile  )
    <i class="bi bi-circle-fill"></i><span class="parghraphe">{{$profile->description}}</span>
     <br>
    @endforeach
    <br>
    <hr>

    <br>
    <form action="{{route('postulestage_store',$stage->id)}}" method="POST" enctype="multipart/form-data">
    @csrf


        <h2>Postuler</h2>
    <input type="file"  class="upload_box" name="image">

    <button type="submit">postuler</button>
    </form>


    </div>

    <br>
    <br></div>
    <br>
    <br>
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
