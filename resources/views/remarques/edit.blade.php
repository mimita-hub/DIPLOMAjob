@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>
          Mes Feeds Backs
        </h1>
        <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">

        </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Commentaire:</h5>
                <div>
                  <p>
               <strong> {{$remarque->feedback->commentaire}}</strong>
                  </p>
                </div>
                <br>
                <h5 class="card-title">Remarque</h5>
                <form action="{{route('remarques.update',$remarque->id)}}" method="post"  >
                    @csrf
                    @method('PUT')
                      <div class="form-group ">
                        <textarea class="form-control " name="description" rows="5" required> {{$remarque->description}}</textarea>
                      </div>
                      <div class="my-3" >
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                      </div>


                      <div class="text-center"><button class="btn btn-success"type="submit">Enregistrer</button></div>
                    </form>
              </div>
            </div>

          </div>
        </div>
      </section>


  </main><!-- End #main -->


@include('adminDash.footerAD')

