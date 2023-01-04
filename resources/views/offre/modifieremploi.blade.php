@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main >


    <section class="modifieremploi">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
        <form method="POST" class="register-form-emploi"  action="{{route('Updateemploi',$emploi->id)}}" >
            @csrf


            <div class="form-group">
                <label for="nom" >{{ __('Nom de poste') }}</label>

            <input id="nom" type="text" placeholder="Nom de post" class="@error('nom') is-invalid @enderror" name="nompost" value="{{$emploi->nompost}}" required autocomplete="nom" autofocus>
            @error('nom')
              <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>
            <div class="form-group">
                <label for="nommétier" >{{ __('Nom de métier') }}</label>
                <input id="nommétier" type="text" placeholder="Nom de métier" class="@error('métier') is-invalid @enderror" name="metier" value="{{$emploi->nommetier}}" required autocomplete="métier" autofocus>
                @error('métier')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <label for="nbpost" >{{ __('Nombre de poste') }}</label>
            <input  id="nbpost"  type="text" placeholder="Nombre de poste" class="nbpost @error('nbpost') is-invalid @enderror" name="nbpost" value="{{$emploi->nombrepost}}" required autocomplete="nbpost" autofocus>
            @error('nbpost')
              <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
              </span>
            @enderror

            <label   for="contrat" >{{ __('Type de contrat') }}</label>
            <select id="contrat" name="contrat" >
                <option selected>{{$emploi->typecontrat}}</option>
                <option>CDD</option>
                <option>CDI</option>
            </select>
            @error('contrat')
              <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
              </span>
            @enderror
            <div class="form-group">
                <label for="experience" >{{ __('Experience demandée') }}</label>
                <select  name="experience" id="experience"  >
                    <option selected>{{$emploi->experiencedemandée}}</option>
                    <option > Sans expérience</option>
                    <option >Moins  an </option>
                    <option >1 à 2 ans </option>
                    <option >3 à 5 ans </option>
                    <option >6 à 10 ans </option>
                    <option >plus à 10 ans </option>
                </select>
                @error('experience')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nvetude" >{{ __("Niveau d'étude(diplome)") }}</label>
                <select name="nvetude"  id="nvetude">
                    <option selected>{{$emploi->niveaudétude}}</option>
                    <option > Licence (LMD),BAC+3</option>
                    <option >Master 1,Licence BAC+4</option>
                    <option >Master 2,Ingniorat,BAC+5</option>
                    <option >Doctorat</option>
                    <option >Certification</option>
                    <option >Formation Professionnelle</option>
                    <option>Universitaire sans diplome</option>
                </select>
                @error('nvetude')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nvpost" >{{ __("Niveau de post") }}</label>
                <select id="nvpost"   name="nvpost" >
                    <option selected>{{$emploi->niveaupost}}</option>
                    <option>Débutant/Junior</option>
                    <option>Jeune diplomé</option>
                    <option>Confirmé/Expérimenté</option>
                    <option>Responsable équipe</option>
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
                <label for="date" >{{ __("Date D'expiration") }}</label>

                <input type="date" placeholder="Date D'expiration " class="@error('date') is-invalid @enderror" name="date" value="{{$emploi->datedexpiration}}" required autocomplete="date" autofocus>
                @error('date')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>
    <hr>
    <span class="title"> Mission</span>


            <button id="addMission" type="button" class="btn btn-danger addmission " > <i class="bi bi-plus-lg"></i>Ajouter</button>

                @foreach ( $emploi->missionemplois as $mission  )

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
                <div  id="newMission"></div>
                <hr>
                <span class="title"> Competence</span>

                    <button id="addCompetence" type="button" class="btn btn-danger addmission " > <i class="bi bi-plus-lg"></i>Ajouter</button>

                @foreach ( $emploi->competenceemplois as $competence  )
                <div class="form-group">
                    <input type="text" placeholder="Comptence" class="@error('competence') is-invalid @enderror" name="competence[]" value="{{$competence->description}}" required autocomplete="competence" autofocus>
                    @error('competence')
                      <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    </div>

                    <div class="form-group " hidden>

                         <input id="type" type="text" class="form-control" name="idcompetence" value="{{$competence->id}}" required autocomplete="idcompetence" autofocus>

                      </div>
                    @endforeach
                    <div  id="newCompetence"> </div>
                    <br>
                    <hr>
       <button  type="sumbit"   id="save" class=" btn btn-success valide">Modifier</button>
    </form>
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
           html += ' <input type="text" placeholder="Competence" class="@error('competence') is-invalid @enderror" name="competencemodifier[]" value="{{ old('competence') }}" required autocomplete="competence" autofocus>';
           html += ' @error('competence')';
           html += ' <span class="invalid-feedback" role="alert">';
           html += '  <strong>{{ $message }}</strong>';
           html += ' </span>';
           html += '@enderror';
           html += ' </div>';
           $('#newCompetence').append(html);
       });

   </script>
