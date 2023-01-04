@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Spécialité</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</a></li>
          <li class="breadcrumb-item active">Compléter | Modifier Spécialité</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Compléter | Modifier Spécialité </h5>

                  </div>

                <form class="row g-3 needs-validation" method="POST"  action="{{ route('specialites.update',$specialite->id) }}">
                    @csrf
                    @method('PUT')
                    <h5><strong class="pb-0 fs-4"> Métier</strong> </h5>
                            <div class="col-10">
                            <button type="button" class="btn btn-info w-50" data-bs-toggle="collapse" data-bs-target="#metier">Associer un métier</button>
                            <div id="metier" class="collapse">
                              <br>
                              <p>sélectionnez le métier correspandant à cette formation :</p>

                             <select  class="form-control" name="metier" >
                                   <option selected> {{$TitreMetier}}</option>
                                 @foreach ($metier as $metier)
                              <option  >{{$metier->titre}}</option>
                              @endforeach

                             </select>

                            </div>
                            </div>
                            <hr>
                    <div class="col-10">
                      <label for="yourName" class="form-label">Nom Specialite</label>
                      <input type="text" name="nomSpecialite" value="{{ $specialite->nomSpecialite}}" class="form-control" id="yourName" required>

                    </div>

                      <div class="col-10">
                        <label for="yourName" class="form-label">Description</label>
                         <textarea class="form-control" name="description" rows="5" placeholder="Description" required>{!!$specialite->description !!}</textarea>
                        </div>
                        <div class="col-10">
                            <label for="yourName" class="form-label">Objectifs de formation:</label>
                             <textarea class="form-control" name="objectifs" rows="5" placeholder="Objectifs" required><?php
                                $varTexteArea= str_replace('<br />', '<br/>', nl2br( $specialite->objectifs ));
                                echo $varTexteArea;
                                ?></textarea>
                            </div>
                    <br>
                    <div class="col-10">
                        <label for="yourName" class="form-label">Pré-requis</label>
                         <textarea class="form-control" name="prerequis" rows="5" placeholder="Pré-requis" required>{{ $specialite->prerequis }}</textarea>
                        </div>
                        <div class="col-10">
                            <label for="yourName" class="form-label">Secteurs Profissionnels</label>
                             <textarea class="form-control" name="secteurs" rows="5" placeholder="Secteurs Profissionnels" required>{{ $specialite->secteurs }}</textarea>
                            </div>


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

