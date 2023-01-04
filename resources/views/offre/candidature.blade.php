@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>gestion candidatures</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</a></li>
          <li class="breadcrumb-item active">Candidatures</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->





    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Candidatures</h5>


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

                      <th >Nom D'offre </th>
                      <th > Type d'offre</th>
                      <th>Nom prénom </th>
                      <th>Non d'université</th>
                      <th>Filiere</th>
                      <th>cv</th>
                    </tr>
                      </thead>
                      <tbody>
                        @foreach ($entreprise->emplois as $emploi )
                        @foreach ($emploi->postules as $post )
                        <tr>
                            <td>{{$post->nomoffre}}</td>
                            <td>Emploi</td>
                            <td>{{$post->nometudiant}}</td>
                            <td>{{$post->nomuniversite}}</td>
                            <td>{{$post->filiere}}</td>

                            <td><a href="{{route('app_pdf',$post->cv)}}">{{$post->cv}}</a></td>
                            @endforeach
                            @endforeach
                        </tr>
                            @foreach ($entreprise->stages as $stage )
                            @foreach ($stage->postulestages as $poststage )
                            <tr>
                                <td>{{$poststage->nomoffre}}</td>
                                <td>Stage</td>
                                <td>{{$poststage->nometudiant}}</td>
                                <td>{{$poststage->nomuniversite}}</td>
                                <td>{{$poststage->filiere}}</td>

                                <td><a href="{{route('app_pdf',$poststage->cv)}}">{{$poststage->cv}}</a></td>
                                @endforeach
                                @endforeach
                            </tr>

                    </tbody>
                </table>



</main>
@include('adminDash.footerAD')
