@include('home.head')

  <main id="main" class="main">


    <section id="about" class="about">
    <div class="container">
        <br>
      <div class="section-title">
        <h2>Chercher Formation  </h2>
       <br>

        <form action="{{route('formation_search')}}" id="#for" class="d-flex" method="GET">
          <input class="form-control me-2 prepend"  name="search" placeholder="Chercher une formation">
          <style>.color-99CC5B{background-color:#ff864e;}</style>
          <button class="btn color-99CC5B" type="submit">Chercher</button>
        </form>
     </div>

      <br>

      <div id="for" class="section-title" id=search>
        <h2>Liste des formations </h2>
        <p>Consultez nos formations</p>
      </div>
      @foreach ($formation as $for )


      <div data-aos="flip-left">
      <ul class="list-group list-group-flush">
          <li class="list-group-item"> <a><strong> {{ $for->nomSpecialite}}</strong><button type="button" class="btn  color-99CC5B float-end " data-bs-toggle="modal" data-bs-target=<?php echo "#".$for->nomSpecialite?>><i class="bi bi-lightbulb"></i></button>
          </a> </li>
        </ul>
      </div>
    <!-- The Modal -->
    <div class="modal " id=<?php echo $for->nomSpecialite?>>
      <div class="modal-dialog modal-lg ">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title"> Master {{ $for->nomSpecialite}} </h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
           <!-- Modal body -->
           <div class="container">
          <div class="modal-body">
            <h6> <strong>Description:</strong></h6>
        {{$for->description}}
        <br>
        <h6> <strong>Objectifs De Formation:</strong></h6>
        {{$for->objectifs}}
         <br>

           </div>
           </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>

          </div>
        </div></div>
        </div>

     @endforeach
     @forelse ($formation as $for )

     @empty
     <p class="alert alert-danger"> <strong> {{request()->query('search')}}</strong>   introuvable </p>

        @endforelse

    <br>
    <!-- ======= formations Section ======= -->

        <br>
      <div class="section-title">
        <h2>Programme formation Université </h2>
        <p>Consultez Les programmes Des Formations </p>

  <style>
   .color{

    color: #263d4d;
    font-weight: 600;
   }
  </style>
   <ul class="list-group list-group-flush">

    @foreach ($formation as $formation)
      <li class="list-group-item" >

        <a href="{{route('formation_details',$formation->id)}}"  >{{$formation->nomSpecialite}}<span class="color" >{{--$formation->departement->faculte->universite->nom_universite--}}</span>
        <i class="bx bx-link float-end"></i>
        </a>
    </li>

@endforeach

    </ul>
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
