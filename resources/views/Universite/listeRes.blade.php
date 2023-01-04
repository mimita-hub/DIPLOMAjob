@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>
          Les départements
        </h1>
        <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">
            @foreach ($univ as $univ)
            @if(Auth::user()->type=="univAdmin"){{{$univ->nom_universite}}}@else{{{ "Universités" }}}@endif
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

                <h5 class="card-title"> Liste Des Département</h5>

                <!-- Table with stripped rows -->
                <table class="table">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Departement</th>
                      <th>Responsable Departement</th>
                      <th>Email Responsable</th>
                      <th>Faculté</th>

                       {{--<th width="250px">Option</th>--}}
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $i=0;
                      @endphp
                    @foreach  ($data as  $data)

                    @if($data->faculte->universite_id == $univ->id)

                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$data->nomDepartement}} </td>
                        <td>{{$data->user->nom }}  {{$data->user->prenom}} </td>
                        <td>{{$data->user->email}} </td>

                        <td>{{$data->faculte->nomFaculte}} </td>


                {{--<td>
                <form action="{{ route('departement.destroy',$data->id) }}" method="POST">
                       <a class="btn btn-primary" href="{{ route('departement.edit',$data->id) }}">Modifier</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>--}}
                    </tr>
                  </tbody>
                 @endif

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

