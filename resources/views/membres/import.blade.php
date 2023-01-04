@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>gestion membres</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</a></li>
          <li class="breadcrumb-item active">Membres</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Créer plusieurs membres </h5>
                    <div class="alert alert-success ">
                        <p>
                            Vous devez respeter l'ordre des colonnes comme suit: <br>
                            nom | prénom | date_naissance(vide) | sexe | type | (specialite ou faculte ou departement selon le type d'utilisateur) |email |mot de passe
                        </p>

                    </div>
                    <form  class="form-control"action="{{route('membres_importStore',['id'=>$data])}}"method="POST" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control" type="file" name="import_file">
                        <br>
                        <button class="btn btn-primary" type="submit">Valider</button>





                       </form>
                  </div>


                </div>
              </div>
          </div>
        </div>
      </section>


  </main><!-- End #main -->


@include('adminDash.footerAD')

