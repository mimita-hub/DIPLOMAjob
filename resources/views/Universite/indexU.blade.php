@include('home.head')

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-center ">
        <h2 class="text-danger" > Gestion Des Universites</h2>

      </div>

    </div>
  </section><!-- End Breadcrumbs -->
  <main class="id-main">
    <div class="container">
        <br>
        <div class="section-title">
            <h2>Ajouter Universite</h2>
            <br>
            <a class="btn color-99CC5B" href="{{route('Universite.create')}}" role="button"><i class='bi bi-plus-lg'></i>Ajouter</a>
        </div>

       <div class="section-title">
         <h2>Chercher  </h2>
         <br>
         <form class="d-flex">
          <input class="form-control me-2" name="search" type="text" placeholder="Chercher ">
          <style>.color-99CC5B{background-color:#ff864e;}</style>
          <button class="btn  color-99CC5B" type="submit"> Chercher</button>
         </form>
      </div>
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
  @endif
     <div class="section-title">
        <table class="table table-borderless">
            <h3>Liste Des Universites </h3>
            <thead>
            <tr>
                 <th >auteur</th>
                 <th>Numéro</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Email</th>
                <th>description</th>

            </tr>
            </thead>

            <tbody>
                @foreach ($etab as $value)

            <tr>
                <td>{{$value->user->nom}}</td>
                <td>{{$value->id}}</td>
                <td>{{ $value->nom}}</td>
                <td>{{ $value->adresse}}</td>
                 <td>{{ $value->adr_email}}</td>
                <td>{{ $value->description}}</td>
            </tr>

            @endforeach
            </tbody>
        </table>
     </div>
  </div>

</main>

@include('home.footer')

