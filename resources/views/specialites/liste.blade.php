@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>
          Les Spécialités
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

                <h5 class="card-title"> Liste Des Spécialités</h5>

                <!-- Table with stripped rows -->
                <table class="table">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Spécilaité</th>
                      <th>Responsable Spécialité</th>
                      <th>Email Responsable</th>
                      <th>Departement</th>

                       {{--<th width="250px">Option</th>--}}
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $i=0;
                      @endphp
                    @foreach  ($data as  $data)

                    @if(Auth::user()->type=="univAdmin" )
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$data->nomSpecialite}} </td>
                        <td>{{$data->user->nom }}  {{$data->user->prenom}} </td>
                        <td>{{$data->user->email}} </td>

                        <td>{{$data->departement->nomDepartement}} </td>
                        @endif
                        @if(Auth::user()->type=="respFaculte" && $data->departement->faculte_id ==$fac->id )
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$data->nomSpecialite}} </td>
                            <td>{{$data->user->nom }}  {{$data->user->prenom}} </td>
                            <td>{{$data->user->email}} </td>

                            <td>{{$data->departement->nomDepartement}} </td>
                            @endif
                            @if(Auth::user()->type=="respDepartement" && $data->departement->id==$dep->id )
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$data->nomSpecialite}} </td>
                                <td>{{$data->user->nom }}  {{$data->user->prenom}} </td>
                                <td>{{$data->user->email}} </td>

                                <td>{{$data->departement->nomDepartement}} </td>


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

