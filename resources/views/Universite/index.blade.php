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
                @if (Auth::user()->type=="admin_sys")
                <h5 class="card-title">Liste Des Universités </h5>
                    <a class="btn btn-success " href="{{route('Universite.create')}}" > Ajouter Université </a>
               @endif
             {{--  @foreach ($data as $univ)
                <h5 class="card-title"> @if (Auth::user()->type=="admin_univ"){{$univ->nom_universite}} @endif </h5>
                @endforeach--}}

              <br><br>
                <!-- Table with stripped rows -->
                <table class="table">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th >Nom</th>
                      <th >email</th>

                      <th >Responsable</th>

                      @if (Auth::user()->type=="admin_sys")

                      <th width="450px">Option</th> @endif
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $i=0;
                      @endphp

                    @foreach ($data as $univ)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$univ->nom_universite}}</td>
                        <td>{{$univ->adr_mail}}</td>
                        <td>{{$univ->user->nom}}

                        @if (Auth::user()->type=="admin_sys")
                        <td>
                            <form action="{{ route('Universite.destroy',$univ->id) }}" method="POST">
                                {{-- <a class="btn btn-info" href="{{ route('filieres.show',$value->id) }}">Show</a>--}}
                                <a class="btn btn-primary" href="{{route('Universite.show',$univ->id)}}">Details</a>
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">Supprimer</button>
                              </form>
                        </td>
                        @endif
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

