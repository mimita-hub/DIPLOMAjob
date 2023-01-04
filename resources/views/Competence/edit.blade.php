@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Filiere</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</a></li>
          <li class="breadcrumb-item active">Competences</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Modifier Compétence</h5>

                  </div>

                <form class="row g-3 needs-validation" method="POST" action="{{ route('Competence.update',$competence->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="col-10">
                        <label for="yourName" class="form-label">code</label>
                        <input type="text" name="code" value="{{ $competence->code }}"class="form-control" id="yourName" required>

                      </div>
                      <div class="col-10">
                        <label for="yourName" class="form-label">Intitule</label>
                        <input type="text" name="intitule" value="{{ $competence->intitule}}" class="form-control" id="yourName" required>

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

