@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>

        </h1>
        <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Liste  Des Métiers


        </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
  <h5 class="card-title"> </h5>


  <div>

    <table class="table table-bordered">

        <thead>
        <tr>
            <th>#</th>
            <th>Metier</th>



        <th width="480px">Option</th>
    </tr>
  </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp

                @foreach ($metiers as $metier)
                <tr>
                <td>{{++$i}}</td>
                <td>{{$metier->titre}}</td>
                <td>
                   <a class="btn btn-primary" href="{{route('detailsMetSpec',['id'=>$metier->id])}}"> Details</a>

                </td>
                </tr>

</tbody>
@endforeach
    </table>



  </div>
<br>

      </section>


  </main><!-- End #main -->


@include('adminDash.footerAD')

