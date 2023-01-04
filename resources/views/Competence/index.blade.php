@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>
            @foreach ($data as $univ)
            <?php if(Auth::user()->type=='admin_univ'){ echo "Gestion"." ".$univ->nom_universite;}else { echo "Gestion Des Universités";} ?>
            @endforeach
        </h1>
        <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">
            @foreach ($data as $univ)
            @if(Auth::user()->type=="admin_univ"){{{$univ->nom_universite}}}@else{{{ "Universités" }}}@endif
          @endforeach
        </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">

                <h5 class="card-title"> Liste Des Compétences</h5>

                    <a class="btn btn-success " href="{{route('Competence.create')}}" > Ajouter Competence </a>
                <br> <br>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
                <!-- Table with stripped rows -->
                <table class="table">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th >code</th>
                      <th >Intitule</th>

                      <th width="250px">Option</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $i=0;
                      @endphp

                    @foreach ($data as $data)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$data->code}}</td>
                        <td>{{$data->intitule}}</td>
                        <td>
                        <form action="{{ route('Competence.destroy',$data->id) }}" method="POST">
                        {{-- <a class="btn btn-info" href="{{ route('filieres.show',$value->id) }}">Show</a>--}}
                            <a class="btn btn-primary" href="{{ route('Competence.edit',$data->id)}}">Modifier</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                       </td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>
                <!-- End Table with stripped rows -->
              </div>
            </div>

          </div>
        </div>
      </section>


  </main><!-- End #main -->


@include('adminDash.footerAD')

