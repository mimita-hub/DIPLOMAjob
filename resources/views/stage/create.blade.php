@include('home.head')
<main id="mainmetier">
    <section class="aboutemploi">
        <div class="container">
            <div class=" section-title-emploi">
                <p>Descriptif de votre offre de stage</p>

                <hr>
                <br>
                <form method="POST" class="register-form-emploi"  action="{{route('stages.store')}}">
                    @csrf
                    <div class="form-group">
                        <input  type="text" placeholder="Nom de stage" class="@error('nom') is-invalid @enderror" name="nomstage" value="{{ old('nom') }}" required autocomplete="nom" autofocus>
                        @error('nom')
                          <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                        </div>



                        <div class="form-group">
                            <input type="text" placeholder="Nom de métier" class="@error('metier') is-invalid @enderror" name="metier" value="{{ old('metier') }}" required autocomplete="metier" autofocus>
                            @error('metier')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                            </div>

                                <div class="form-group">
                                    <select name="nvpost"  >
                                        <option selected>Niveau de post</option>
                                        <option >Etudiant/Stagiaire</option>
                                        <option>Débutant/Junior</option>
                                        <option >Jeune diplomé</option>
                                        <option>Confirmé/Expérimenté</option>
                                        <option>Responsable d'équipe</option>
                                        <option>Manager/Responsable département</option>
                                        <option >Cadre dirigeant</option>



                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="nvetude"  >
                                            <option selected>Niveau d'étude(diplome)</option>
                                            <option > Licence (LMD),BAC+3</option>
                                            <option >Master 1,Licence BAC+4</option>
                                            <option >Master 2,Ingniorat,BAC+5</option>
                                            <option >Doctorat</option>
                                            <option >Certification</option>
                                            <option >Formation Professionnelle</option>
                                        </select>
                                        </div>

                                            <input    type="text" placeholder="Nombre de poste" class="nbpost @error('nbpost') is-invalid @enderror" name="nbpost" value="{{ old('nbpost') }}" required autocomplete="nbpost" autofocus>
                                            @error('nbpost')
                                              <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                            <select class=" nvpost"  name="period" >
                                                <option selected>Période</option>
                                                <option>3 mois</option>
                                                <option>6 mois</option>
                                                <option >1 an</option>
                                            </select>
                                        <br>

                                        <br>
                                        <hr>
                                        <span class="title"> Missions</span>

                                         <button id="addMission" type="button" class="btn btn-danger addmission" > <i class="bi bi-plus-lg"></i>Ajouter</button>

                                         <div class="form-group">
                                             <input type="text" placeholder="Mission" class="@error('mission') is-invalid @enderror" name="mission[]" value="{{ old('mission') }}" required autocomplete="mission" autofocus>
                                             @error('mission')
                                               <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                               </span>
                                             @enderror
                                             </div>
                                             <div  id="newMission"></div>
                                             <br>
                                             <hr>
                                             <span class="title"> Profil</span>

                                                 <button id="addCompetence" type="button" class="btn btn-danger addmission " > <i class="bi bi-plus-lg"></i>Ajouter</button>

                                                 <div class="form-group">
                                                     <input type="text" placeholder="profil" class="@error('competence') is-invalid @enderror" name="competence[]" value="{{ old('competence') }}" required autocomplete="competence" autofocus>
                                                     @error('competence')
                                                       <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                       </span>
                                                     @enderror
                                                     </div>
                                                     <div id="newCompetence"> </div>

          <br>
          <hr>
          <button  type="sumbit"   id="save" class="valide">envoyer</button>
                </form>
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


 <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script type="text/javascript">
    // add row

    $("#addMission").click(function () {
        var html = '';
        html += '<div class="form-group">';
        html += ' <input type="text" placeholder="Mission" class="@error('mission') is-invalid @enderror" name="mission[]" value="{{ old('mission') }}" required autocomplete="mission" autofocus>';
        html += '';
        html += '';
        html += '';
        html += ' @error('mission')';
        html += ' <span class="invalid-feedback" role="alert">';
        html += '  <strong>{{ $message }}</strong>';
        html += ' </span>';
        html += '@enderror';
        html += ' </div>';
        $('#newMission').append(html);
    });
    $("#addCompetence").click(function () {
        var html = '';
        html += '<div class="form-group">';
        html += ' <input type="text" placeholder="Profil" class="@error('competence') is-invalid @enderror" name="competence[]" value="{{ old('competence') }}" required autocomplete="competence" autofocus>';
        html += ' @error('competence')';
        html += ' <span class="invalid-feedback" role="alert">';
        html += '  <strong>{{ $message }}</strong>';
        html += ' </span>';
        html += '@enderror';
        html += ' </div>';
        $('#newCompetence').append(html);
    });
</script>
