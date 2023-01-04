@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main >
    <section class="modifieremploi">

        <form method="POST" class="register-form-emploi"  action="{{route('Updatestage',$stage->id)}}" >
            @csrf
            <div class="form-group">
                <label for="nom" >{{ __('Nom de stage') }}</label>
                <input id="stage" type="text" placeholder="Nom de stage" class="@error('nom') is-invalid @enderror" name="nomstage" value="{{$stage->nomstage}}" required autocomplete="nom" autofocus>
                @error('nom')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="nommétier" >{{ __('Nom de métier') }}</label>
                    <input id="nommétier" type="text" placeholder="Nom de métier" class="@error('métier') is-invalid @enderror" name="metier" value="{{$stage->nommetier}}" required autocomplete="métier" autofocus>
                    @error('métier')
                      <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <label for="nbpost" >{{ __('Nombre de poste') }}</label>
                <input  id="nbpost"  type="text" placeholder="Nombre de poste" class="nbpost @error('nbpost') is-invalid @enderror" name="nbpost" value="{{$stage->nombrepost}}" required autocomplete="nbpost" autofocus>
                @error('nbpost')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                @enderror
                <div class="form-group">
                    <label for="nvetude" >{{ __("Niveau d'étude(diplome)") }}</label>
                    <select  name="nvetude"  >
                        <option selected>{{$stage->niveaudétude}}</option>
                        <option > Licence (LMD),BAC+3</option>
                        <option >Master 1,Licence BAC+4</option>
                        <option >Master 2,Ingniorat,BAC+5</option>
                        <option >Doctorat</option>
                        <option >Certification</option>
                        <option >Formation Professionnelle</option>
                    </select>
                    @error('nvetude')
                      <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nvpost" >{{ __("Niveau de post") }}</label>
                    <select name="nvpost"  >
                        <option selected>{{$stage->niveaupost}}</option>
                        <option >Etudiant/Stagiaire</option>
                        <option>Débutant/Junior</option>
                        <option >Jeune diplomé</option>
                        <option>Confirmé/Expérimenté</option>
                        <option>Responsable d'équipe</option>
                        <option>Manager/Responsable département</option>
                        <option >Cadre dirigeant</option>



                    </select>
                    @error('nvpost')
                      <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="période" >{{ __("Période") }}</label>
                    <select class=" nvpost"  name="période" >
                        <option selected>{{$stage->periode}}</option>
                        <option>3 mois</option>
                        <option>6 mois</option>
                        <option >1 an</option>
                    </select>
                    @error('période')
                      <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <hr>
                <span class="title"> Missions</span>

                 <button id="addMission" type="button" class="btn btn-danger addmission" > <i class="bi bi-plus-lg"></i>Ajouter</button>

                 @foreach ( $stage->missionstages as $mission  )
                 <div class="form-group">
                    <input type="text" placeholder="Mission" class="@error('mission') is-invalid @enderror" name="mission[]" value="{{$mission->description}}" required autocomplete="mission" autofocus>
                    @error('mission')
                      <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    </div>
                    <div class="form-group " hidden>

                        <input id="type" type="text" class="form-control" name="idmission" value="{{$mission->id}}" required autocomplete="idmission" autofocus>

                     </div>

                    @endforeach
                    <div  id="newMission">  </div>
                    <hr>
                    <span class="title"> Profil</span>

                        <button id="addCompetence" type="button" class="btn btn-danger addmission " > <i class="bi bi-plus-lg"></i>Ajouter </button>

                    @foreach ( $stage->profilstages as $profil  )

                        <div class="form-group">
                            <input type="text" placeholder="Profil" class="@error('competence') is-invalid @enderror" name="competence[]" value="{{$profil->description}}" required autocomplete="competence" autofocus>
                            @error('competence')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                            </div>
                            <div class="form-group " hidden>

                                <input id="type" type="text" class="form-control" name="idprofil" value="{{$profil->id}}" required autocomplete="idprofil" autofocus>

                             </div>
                    @endforeach
                    <div id="newCompetence"></div>
                    <br>
                    <hr>
                    <button  type="sumbit"   id="save" class=" btn btn-success valide">Modifier</button>
    </section>
</main>
@include('adminDash.footerAD')
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script type="text/javascript">
    // add row

    $("#addMission").click(function () {
        var html = '';
        html += '<div class="form-group">';
        html += ' <input type="text" placeholder="Mission" class="@error('mission') is-invalid @enderror" name="missionmodifier[]" value="{{ old('mission') }}" required autocomplete="mission" autofocus>';
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
        html += ' <input type="text" placeholder="Profil" class="@error('competence') is-invalid @enderror" name="profilmodifier[]" value="{{ old('competence') }}" required autocomplete="competence" autofocus>';
        html += ' @error('competence')';
        html += ' <span class="invalid-feedback" role="alert">';
        html += '  <strong>{{ $message }}</strong>';
        html += ' </span>';
        html += '@enderror';
        html += ' </div>';
        $('#newCompetence').append(html);
    });
</script>
