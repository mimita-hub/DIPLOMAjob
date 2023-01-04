@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Valider Formation</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</a></li>

        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section  " >
        <div class="row">
          <div class="col-lg-12">

            <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Valider Formation </h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>VH cours :</th>
                                <th>VH TD </th>
                                <th>VH TP</th>
                                <th>total crédits</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>483</td>
                                        <td>252</td>
                                        <td>231</td>
                                        <td>120</td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                          <th>Volume Horaire de cours :</th>
                          <th>Volume Horaire de TD </th>
                          <th>Volume Horaire de TP</th>
                          <th>le total des crédits</th>
                            </tr>
                                </thead>

                                <tbody>

                    <tr>
                        <td> {{$VHcours}}</td>
                        <td> {{$VHtd}}</td>
                        <td> {{$VHtp}}</td>
                        <td>{{$credit}}</td>
                    </tr>
                    </tbody>
                    </table>

           {{--  @if($x==0)
                     <div class="alert alert-danger ">

                        <p>{{$message1}}</p>
                     </div>
            @else
            <div class="alert alert-success ">

                <p>{{$message1}}</p>
             </div>
             @endif

             @if($y==0)
             <div class="alert alert-danger ">

                <p>{{$message2}}</p>
             </div>
    @else
    <div class="alert alert-success ">
        <p>{{$message2}}</p>
    </div>

@endif

@if($z==0)
<div class="alert alert-danger ">

   <p>{{$message3}}</p>
</div>
@else
<div class="alert alert-success ">
<p>{{$message3}}</p>
</div>

@endif

@if($w==0)
<div class="alert alert-danger ">
   <p>{{$message4}}</p>
</div>
@else
<div class="alert alert-success ">
<p>{{$message4}}</p>
</div>

@endif --}}
<div class="flash-message">
    @foreach ($success as $msg)
        <p class="alert alert-success">{{ $msg }}</p>
    @endforeach
    @foreach ($danger as $msg)
        <p class="alert alert-danger">{{ $msg }}</p>
    @endforeach
</div>











                </div>
            </div>
          </div>
      </div>
    </div>

                </section>


            </main><!-- End #main -->


          @include('adminDash.footerAD')

