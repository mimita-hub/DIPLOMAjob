@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>gestion stage</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</a></li>
          <li class="breadcrumb-item active">Stages</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->





    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Stage</h5>
                <a class="btn btn-success" href="{{ route('stages.create') }}"><i class="bi bi-plus-lg"></i>Ajouter Stage</a>

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

                      <th width="150px">Nom de Poste </th>

                      <th width="170px">Niveau De  Poste</th>
                      <th width="250px">Niveau d'étude</th>

                      <th width="480px">Option</th>
                    </tr>
                      </thead>
                      <tbody>
                        @foreach ($entreprise->stages as $stage )
                        <tr>
                            <td>{{$stage->nomstage}}</td>
                            <td>{{$stage->niveaupost}}</td>
                            <td>{{$stage->niveaudétude}}</td>

                            <td>
                                <form action="{{ route('stages.destroy',$stage->id) }}" method="POST">

                                    <a class="btn btn-primary" href="{{route('app_afficherstage',[$stage->id,$stage->entreprise_id])}}"><i class="bi bi-eye-fill"></i> Details</a>
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Supprimer</button>
                                      <a class="btn btn-primary" href="{{route('ModifierStage',$stage->id)}}"><i class="bi bi-pencil-square"></i> Modifier</a>

                                    </form>
                            </td>
                            @endforeach

                        </tr>
                      </tbody>
                      </table>

</main>
@include('adminDash.footerAD')
