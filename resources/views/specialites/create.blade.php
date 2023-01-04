@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Filiere</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</a></li>
          <li class="breadcrumb-item active">Formations</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section  " >
        <div class="row">
          <div class="col-lg-12">

            <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Créer Formation </h5>

                  </div>


            <h5><strong class="pb-0 fs-4"> Les Modules</strong> </h5>
      <!--      <div class="col-10">
                    <label class="col-sm-4 control-label"> <strong >Filieres </strong></label>
                    @foreach ( $filiere as $value)
                    <div class="col-sm-9">
                     <input type="checkbox" name="filiere_id" value={{$value->id}} >
                     <label for="">{{$value->nom}}</label>
                    </div>
                    @endforeach
                </div>-->
                 <hr>
                   <form action="" method="POST" autocomplete="on">
                    <div class="col-10">
                      <label for="yourName" class="form-label">Module</label>
                      <input type="text" name="titre" class="form-control " placeholder="entrez le nom du module" required>

                    </div>
                    <div class="col-10">
                        <label class="form-label" for="type">Coefficient : </label>
                        <select name="coeff" type="nember" class="form-control"  required>
                            <option > --- </option>
                            <option value=1>1 </option>
                            <option  value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                            </select>
                    </div>
                      <div class="col-10">
                        <label class="form-label" for="type">Crédit : </label>
                        <select name="credit" type="nember" class="form-control"  required>
                            <option > --- </option>
                            <option value=1>1 </option>
                            <option  value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                            </select>
                    </div>
                    <div class="col-10">
                        <label class="form-label" for="type">Volume Horaire par semester  : </label>
                        <input type="number" name="vhs" class="form-control" required>

                    </div>
                    <div class="col-10">
                        <label class="form-label" for="type">Volume Horaire hebdomadaire  : </label>
                    <div class=" from-check ">

                        <input type="checkbox" name="vhh" value="C" class="form-check-input" id="1" required>
                        <label class="form-check-label" for="1"> C </label>
                        <select name="credit" type="nember" class="form-select-inline" required>
                            <option >--- </option>
                            <option value=1>1h </option>
                            <option  value=2>1h30</option>
                            <option value=3>2h</option>
                            <option value=4>2h30</option>
                            </select>

                    </div><br>
                    <div class=" from-check ">

                        <input type="checkbox" name="vhh" value="C" class="form-check-input" id="2" required>
                        <label class="form-check-label" for="2"> TD </label>
                        <select name="credit" type="nember"class="form-select-inline" required>
                            <option >--- </option>
                            <option value=1>1h </option>
                            <option  value=2>1h30</option>
                            <option value=3>2h</option>
                            <option value=4>2h30</option>
                            </select>

                    </div>
                    <br>
                    <div class=" from-check ">

                        <input type="checkbox" name="vhh" value="tp" class="form-check-input" id="3" required>
                        <label class="form-check-label" for="3"> TP</label>
                        <select name="credit" type="nember" class="form-select-inline"  required>
                            <option >--- </option>
                            <option value=1>1h </option>
                            <option  value=2>1h30</option>
                            <option value=3>2h</option>
                            <option value=4>2h30</option>
                            </select>

                    </div>
                    </div>
                    <div class="col-10">
                        <label class="form-label" for="type">Unité Enseignement : </label>
                        <select name="credit" type="nember" class="form-control"  required>
                            <option >--- </option>
                            <option value=1>UE Fondamentales </option>
                            <option  value=2>UE méthodologie</option>
                            <option value=3>UE découverte</option>

                            </select>
                    </div>
                    <div class="col-10">
                        <label class="form-label" for="type">Semestre : </label>
                        <select name="credit" type="nember" class="form-control"  required>
                            <option >--- </option>
                            <option value=1>1 </option>
                            <option  value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>3</option>

                            </select>
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
      </section>


  </main><!-- End #main -->


@include('adminDash.footerAD')

