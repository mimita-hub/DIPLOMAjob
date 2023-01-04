@include('home.header')
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h1>  Competences</h1>
      <h2>Compétences développées à l'issue de nos formations</h2>
      <div class="d-flex">
        <a href="#about" class="btn-get-started scrollto">Consulter</a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
          <!-- ======= about section =======-->

           <section id="about" class="about">
        <div class="container">
            <br>
           <!-- <div class="section-title">
                <h2>Ajouter Des Compétences</h2>
                <br>
                <a class="btn color-99CC5B" href="#" role="button"><i class='bi bi-plus-lg'></i>Nouvelle Compétence</a>
                <a class="btn color-99CC5B" href="#" role="button"> <i class='bi bi-plus-lg'></i>Eléments de Compétence</a>
              </div>-->
        <div class="section-title">
            <h2>Chercher  </h2>
           <br>
           <form action="{{route('competence_search')}}" class="d-flex" method="GET">

            <input class="form-control me-2 prepend" type="search" name="search" placeholder="Chercher une competence">
            <style>.color-99CC5B{background-color:#ff864e;}</style>
            <button class="btn color-99CC5B" type="submit">Chercher</button>
          </form>
        </div>

          <br>


          <!-- liste des compétences-->

        <div class="section-title">
            <h2>Liste Des Compétences </h2>
        </div>

        <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#Competence">  Compétences</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#elementCompetence">Eléments De Compétences</a>
            </li>
          <!--   <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#Matrice">Matrice De Compétences</a>
            </li>-->
        </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="Competence" class="container tab-pane active"><br>
                    <h3>Les Compétences :</h3>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Code</th>
                                    <th scope="col">Intitule</th>


                                </tr>
                                </thead>
                                @if ((!empty($competences)) && $competences->count())

                                @foreach ($competences as $competence)
                                <tbody>
                                <tr>
                                    <td scope="row">{{$competence->code}}</td>
                                    <td>{{$competence->intitule}}</td>

                                </tr>
                                </tbody>
                                @endforeach

                                @endif
                                @forelse ($competences as $competence)

                                @empty
                                  <p class="alert alert-danger"> <strong> {{request()->query('search')}}</strong>   introuvable </p>

                                @endforelse
                            </table>
                            <div class="row">{{$competences->links()}}</div>

                            </div>
                            <div id="elementCompetence" class="container tab-pane fade"><br>
                            <h3>Les Eléments De Compétences :</h3>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Code</th>
                                    <th scope="col">Intitule</th>
                                    <th scope="col">Objectif</th>

                                    <th scope="col">Niveau</th>


                                </tr>
                                </thead>
                                @if ((!empty($elements)) && $elements->count())

                                @foreach ($elements as $element)

                                <tbody>
                                <tr>
                                    <th scope="row">{{$element->code}}</th>
                                    <td>{{$element->intitule}}</td>
                                  <td>{{$element->objectif}}</td>
                                    <td>{{$element->niveau}}</td>

                                </tr>
                                @endforeach
                                @endif
                                @forelse ($elements as $element)

                                @empty
                                  <p class="alert alert-danger"> <strong> {{request()->query('search')}}</strong>   introuvable </p>

                                @endforelse
                                </tbody>
                            </table>
                            <div class="row">
                                {{$elements->links()}}</div>
    </div>

  </div>
</div>
</section>








  </main>
 @include('home.footer')
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/home/assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('assets/home/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/home/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/home/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/home/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/home/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/home/assets/js/main.js')}}"></script>



</body>

</html>
