@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Specialite</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</a></li>
          <li class="breadcrumb-item active"></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Modifier Prérequis</h5>

                  </div>

                <form class="row g-3 needs-validation" method="POST"  action="{{ route('prerequis.update',$prerequi->id) }}">
                    @csrf
                    @method('PUT')
                    <h5><strong class="pb-0 fs-4"> Prérequis</strong> </h5>

                    <div class="form-check">


                        <label class="form-check-label" ><input class="form-check-input" type="checkbox" name="prerequis[]" value="{{$mod->titre}}"  >
                       </label> <br>




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

