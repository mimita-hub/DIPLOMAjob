@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>gestion  feedbacks </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</a></li>
          <li class="breadcrumb-item active">feedbacks</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->





    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">feedbacks</h5>

                 <br><br>
                 @if ($message = Session::get('success'))
                 <div class="alert alert-success">
                     <p>{{ $message }}</p>
                 </div>
             @endif
                <!-- Table with stripped rows -->
                <table class="table">
                  <thead>
                    <tr>

                      <th >Feedbacks</th>
                      <th>Spécialité</th>
                      </thead>
                      <tbody>
                        @foreach ($feedbacks as $fed )
                        <tr>
                            <td>{{$fed->commentaire}}</td>
                            <td>{{$fed->specialite->nomSpecialite}}</td>



                        </tr>
                        @endforeach
                      </tbody>
                      </table>

</main>
@include('adminDash.footerAD')
