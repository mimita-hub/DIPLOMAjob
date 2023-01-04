@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>gestion emplois</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</a></li>
          <li class="breadcrumb-item active">Emplois</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->





    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Emplois</h5>
                <a class="btn btn-success" href="{{ route('offre.create') }}"><i class="bi bi-plus-lg"></i>Ajouter Emploi</a>
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

                      <th width="230px" >Nom De Poste</th>

                       <th width="180px">Niveau De Poste</th>
                       <th width="230px">Niveau d'étude</th>


                      <th width="480px">Option</th>
                    </tr>
                      </thead>
                      <tbody>
                        @foreach ($entreprise->emplois as $emploi )
                        <tr>
                            <td>{{$emploi->nompost}}</td>
                            <td>{{$emploi->niveaupost}}</td>
                            <td>{{$emploi->niveaudétude}}</td>


                            <td>
                                <form action="{{ route('offre.destroy',$emploi->id) }}" method="POST">

                                    <a class="btn btn-primary" href="{{route('app_afficheremploi',[$emploi->id,$emploi->entreprise_id])}}"><i class="bi bi-eye-fill"></i> Details</a>
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Supprimer</button>
                                      <a class="btn btn-primary" href="{{route('ModifierEmploi',$emploi->id)}}"><i class="bi bi-pencil-square"></i> Modifier </a>

                                    </form>
                            </td>
                            @endforeach

                        </tr>
                      </tbody>
                      </table>

</main>
@include('adminDash.footerAD')
