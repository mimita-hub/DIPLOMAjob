@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>
          Mes remarques
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

                <h5 class="card-title"> Liste Des Remarques</h5>

                <!-- Table with stripped rows -->
                <table class="table">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th >Ma Remarque</th>
                      <th>date</th>
                      <th width="250px">Option</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $i=0;
                      @endphp
                    @if($data->count()>0)
                    @foreach ($data as $remarque)

                    <tr>
                        <td>{{++$i}}</td>
                        <td width="250px"> <button type="button" class="btn btn-light" data-bs-toggle="collapse" data-bs-target="#remarque">voir</button></td>

                    <td>{{$remarque->created_at->format('d/m/y')}}</td>

                <td>

                  <form action="{{ route('remarques.destroy',$remarque->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{route('remarques.edit',$remarque->id)}}"> Modifier</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>

            </td>
                    </tr>
                  </tbody>

                  @endforeach
                  <div class="alert alert-warning" id="remarque" class="collapse">
                    <h4 class="text-center">Remarque :</h4>
                  <p>
                 <strong>Date:</strong>  {{$remarque->created_at}} <br>
                 <strong>feedback:</strong> <br>
                  {{$remarque->feedback->commentaire}}
                  </p>
                  <p>
                    <strong>Description :</strong> <br>   {{$remarque->description}}
                  </p>

                    </div>

                    @else
                    introuvable
                     @endif
                </table>



                <!-- End Table with stripped rows -->
              </div>
            </div>

          </div>
        </div>
      </section>


  </main><!-- End #main -->


@include('adminDash.footerAD')

