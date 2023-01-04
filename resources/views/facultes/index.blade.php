@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>
          Les facultés
        </h1>
        <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">
            @foreach ($data as $univ)
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
                @if(Auth::user()->type=="univAdmin")
                <h5 class="card-title"> Liste Des Facultés</h5>
                @else
                <h5 class="card-title"> Faculté</h5>

                @endif
                <!-- Table with stripped rows -->
                <table class="table">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th >Faculté</th>
                      <th>Responsbale Faculte</th>
                      <th>Email Resposnable</th>
                      <th>Univ</th>
                      @if(Auth::user()->type=="univAdmin")
                      <th width="250px">Option</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $i=0;
                      @endphp

                    @foreach ($data as $fac)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$fac->nomFaculte}}</td>
                        </td>
                    <td>{{$fac->user->nom }} {{$fac->user->prenom}}</td>
                    <td> {{$fac->user->email}}

                    <td> {{$fac->universite->nom_universite}}

                        @if(Auth::user()->type=="univAdmin")

                <td>
                    <a class="btn btn-primary" href="{{ route('facultes.edit',$fac->id) }}">Modifier</a>

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

