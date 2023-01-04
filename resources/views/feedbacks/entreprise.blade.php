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
                      <th >Date</th>
                      <th>Spécialité</th>
                      <th>option</th>
                      </thead>
                      <tbody>
                        @foreach ($feedbacks as $fed )
                        <tr>
                            <td>{{$fed->commentaire}}</td>
                            <td>{{$fed->created_at->format('d/m/y')}}</td>
                            <td>{{$fed->specialite->nomSpecialite}}</td>
                             <td>
                                 <form action="{{route('entreprise_feed',$fed->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Supprimer</button>

                                 </form>

                             </td>


                        </tr>
                        @endforeach
                      </tbody>
                      </table>

</main>
@include('adminDash.footerAD')
