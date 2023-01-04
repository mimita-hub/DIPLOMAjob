@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Module</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</a></li>
          <li class="breadcrumb-item active">Ajouter Module</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section  " >
        <div class="row">
          <div class="col-lg-12">

            <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Créer Formation /Ajouter Module</h5>

                  </div>

                   <form method="POST" action="{{route('moduls_store',['id'=>$data])}}"  >
                    @csrf

                    <h5><strong class="pb-0 fs-4"> les élements de compétences</strong> </h5>
                    <div class="col-10">
                    <button type="button" class="btn btn-info" data-bs-toggle="collapse" data-bs-target="#element">Associer </button>

                    <div id="element" class="collapse">
                      <br>
                      <p>sélectionnez un élément de compétence pour lui créer son module correspandant  </p>

                     <select id='myselect' name="element[]" class="form-control @error('element') is-invalid @enderror" aria-placeholder="choisir l'elément de compétence"  multiple >

                        @foreach ($data->metiers as $data )
                        @foreach ($data->missions as $data )
                        @foreach ($data->competences as $data )
                        @foreach ($data->elementcompetences as $data )
                        <option > {{$data->intitule}} </option>
                        @endforeach
                        @endforeach
                        @endforeach
                        @endforeach
                     </select>
                     @error('element')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror



                    </div>
                    <script>
                        $('#myselect').select2({
                            width: '100%',
                            placeholder: "selectionnez un ou plusieurs élements",
                            allowClear: true
                        });
                        </script>
                    </div>
                    @error('element')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    <hr>
                    <h5><strong class="pb-0 fs-4">Le Module</strong> </h5>
                    <div class="col-10">

                      <input placeholder="Nom Module" type="text" name="titre" class="form-control @error('titre') is-invalid @enderror " placeholder="entrez le nom du module" required>
                      @error('titre')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>

                    <div class="col-10" hidden>

                        <input type="text" name="specialite_id" value="1" class="form-control " placeholder="entrez le nom du module" required>

                      </div><br>
                    <div class="col-10">

                        <select aria-placeholder="Coefficient" name="coeff" type="nember" class="form-control @error('coeff') is-invalid @enderror"  required>
                            <option >Coefficient </option>
                            <option value=1>1 </option>
                            <option  value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                            </select>
                            @error('coeff')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>

                      <div class="col-10">
                      <select name="credit" type="nember" class="form-control @error('credit') is-invalid @enderror"  required>
                            <option >Crédit </option>
                            <option value=1>1 </option>
                            <option  value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                            </select>
                            @error('credit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> <br>
                    <div class="col-10">
                        <input placeholder="Volume Horaire par semestre" type="number" max="200" min="0" name="vsh" class="form-control" required>

                    </div><br>
                    <div class="col-10">
                        <label class="form-label" for="type">Volume Horaire hebdomadaire  : </label>
                    </div>
                    <div class="col-10">
                       <label class="form-label-inline" for="1"> C </label>
                        <select name="C" type="text" class="form-select-inline" required>
                            <option ></option>
                            <option value=" ">0</option>
                            <option value="60">1h </option>
                            <option  value="90">1h30</option>
                            <option value="120">2h</option>
                            <option value="150">2h30</option>
                            <option value="180">3h</option>
                            </select>
                            @error('C')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label class="form-label-inline" for="2"> TD </label>
                        <select name="TD" type="nember"class="form-select-inline" required>
                            <option ></option>
                            <option value=" ">0</option>
                            <option value="60">1h </option>
                            <option  value="90">1h30</option>
                            <option value="120">2h</option>
                            <option value="150">2h30</option>
                            <option value="180">3h</option>
                            </select>
                            @error('TD')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                         <label class="form-check-label" for="3"> TP</label>
                        <select name="TP" type="nember" class="form-select-inline @error('TP') is-invalid @enderror "  required>
                            <option ></option>
                            <option value=" ">0</option>
                            <option value="60">1h </option>
                            <option  value="90">1h30</option>
                            <option value="120">2h</option>
                            <option value="150">2h30</option>
                            <option value="180">3h</option>
                            </select>
                            @error('TP')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                         <br>
                    <div class="col-10">
                         <select name="unite" type="text" class="form-control @error('unite') is-invalid @enderror"   required>
                            <option > Unité Enseignement</option>
                            <option value="UEF">UE Fondamentales </option>
                            <option  value="UEM">UE méthodologie</option>
                            <option value="UED">UE découverte</option>
                            <option value="UET">UE transeversale</option>


                            </select>
                            @error('unite')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


             <br>
                    <div class="col-10">
                      <button class="btn btn-primary w-100" type="submit">Valider</button>
                    </div>

                </form>

                 </div>
                </div>
              </div>
          </div>
        </div>
      </section>


  </main><!-- End #main -->


@include('adminDash.footerAD')

