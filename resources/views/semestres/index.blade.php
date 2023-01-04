@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>

        </h1>
        <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dash')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('semestres.index')}}">Semestre</a></li>


        </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">

                <h5 class="card-title">Semestre | Modules </h5>
                <!-- Table with stripped rows -->
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
                <table class="table">
                  <thead>
                    <tr>

                      <th>#Semestre</th>
                      <th >module</th>

                      <th width="300px">Option</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ( $semestre as $semestre )

                    <tr>

                        <td> {{$semestre->code}}  </td>

                        <td>

                            {{$semestre->Module->titre}}</td>

                  <td>

                    <form action="{{ route('semestres.destroy',$semestre->id) }}" method="POST">

                     {{--  <a class="btn btn-info" href="{{route('semestres.edit',$semestre->id)}}">Modifier</a>
                    --}}
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Supprimer</button>
                      </form>

            </td>
                    </tr>
                  </tbody>

                  @endforeach
                </table>
  <p>

  <cite>

  </cite>




  </p>

            </div>

          </div>
        </div>
      </section>


  </main><!-- End #main -->


@include('adminDash.footerAD')

