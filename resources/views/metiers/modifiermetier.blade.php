@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main >


    <section class="modifieremploi">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
        <form method="POST" class="register-form-emploi"  action="{{route('UpdateMetier',$metier->id)}}" >
            @csrf
            <div class="form-group">
                <label for="titremetier" >{{ __('Nom de Métier') }}</label>
                <input   id="titremetier"type="text" placeholder="Nom du Métier" class="@error('titremetier') is-invalid @enderror" name="titremetier" value="{{ $metier->titre }}" required autocomplete="titremetier" autofocus>
            @error('nom')
              <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>
            <div class="form-group">
                <label for="descriptionmetier" >{{ __('Description') }}</label>
                <textarea id="descriptionmetier"         placeholder="description"  class=" @error('descriptionmetier') is-invalid @enderror" name="descriptionmetier" rows="6">{{$metier->description}}</textarea>

                @error('descriptionmetier')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

             </div>
             <hr>

             @foreach ($metier->missions as $mission)

             <label for="Missions" >{{ __('Missions')  }}</label>


            <div class="form-group">
           <input  id="Missions" type="text" placeholder="Mission" value="{{$mission->description}}" name="description[]" >
           </div>
           <div class="form-group " hidden>
           <input id="type" type="text" class="form-control" name="idmission[]" value="{{$mission->id}}" required autocomplete="idmission" autofocus>
            </div>
           @foreach ($mission->competences as $competence)

           <label for="Competences" >{{ __('Competences')  }}</label>

            <input  id="Competences" type="text" placeholder="Competence" class="nb" name="intitule[]"  value="  {{$competence->intitule}}">
            <div class="form-group " hidden>
                <input id="type" type="text" class="form-control" name="idcompetence[]" value="{{$competence->id}}" required autocomplete="idcompetence" autofocus>
                 </div>
            @foreach ($competence->elementcompetences as $elem)
            <label for="Element" >{{ __('Element de comptence')  }}</label>
             <div class="form-group ">
              <input  id="Element"  type="text" placeholder=" Element de Competence"  name="element[]" value="{{$elem->intitule}}">
          </div>
          <div class="form-group ">
              <input   type="text" placeholder=" Niveau de comptence"  name="niveau[]"  value="{{$elem->niveau}}">
          </div>
          <div class="form-group ">
              <textarea id="descriptionmetier" placeholder="objectif"   name="objectif[]"  rows="4" >{{$elem->objectif}}</textarea>
           </div>
           <div class="form-group " hidden>
            <input id="type" type="text" class="form-control" name="idelement[]" value="{{$elem->id}}" required autocomplete="idelement" autofocus>
             </div>
          @endforeach
          <hr>
            @endforeach

              @endforeach
             <button  type="sumbit"   id="save" class=" btn btn-success valide">Modifier</button>

    </form>
   </section>
    </main>
    @include('adminDash.footerAD')
