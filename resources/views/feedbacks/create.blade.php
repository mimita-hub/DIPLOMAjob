@include('home.head')


<link href="{{asset('assets\rating.css')}}" rel="stylesheet">

<main id="main">
    <style>.color-99CC5B{background-color:#ff864e;}</style>
    <section class="breadcrumbs">
        <div class="container">

          <div class="d-flex justify-content-between align-items-center">
            <h2>Votre Avis est important pour nous </h2>
            <ol>

                <li><a href="{{route('formation_details',$specialite->id)}}">
                    <i class="bi bi-arrow-left-circle-fill"></i>       Retour </a>
                </li>

          </div>
        </div>
    </section>


    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

      <div class=" section-title">
          <h2>Donnez votre Avis</h2>
          <p></p>

        </div>
        <div class="row">
            <div class="col-lg-20">
              <div class="row">
             <div class="col-md-6">
            <div class="info-box md-11">
                <i class="bi bi-lightbulb"></i>
              <h3> Compétence</h3>
              <p style="margin: 20px" class="text-success small">vous pouvez donner votre avis sur un élement de compétence correspondant à la formation sélectionné </p>

                    <form action="{{route("store_feed",$specialite->id)}}" method="post"  >
                        @csrf
                     <select class="form-control small"  style="margin:8px"  name="competence_id" id="">
                        <option></option>
                        @foreach ($specialite->metiers as $data )
                        @foreach ($data->missions as $data )
                        @foreach ($data->competences as $data )
                        <option value="{{$data->id}}"> {{$data->intitule}} </option>
                        @endforeach
                        @endforeach
                        @endforeach
                     </select>
                     <input type="text"  name="rating" value="1" hidden/>
                     <input type="text" name="elementcompetence_id" value="" hidden>
                     {{--<div class="rate" hidden>
                        <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" class="rate" name="rating" value="2">
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                        <label for="star1" title="text">1 star</label>
                     </div>--}}
                     <div class="form-group" style="margin: 25px">
                           <textarea class="form-control " name="commentaire" rows="5" placeholder="commentaire..." required></textarea>
                    </div>

                    <div class="text-center"><button class="btn color-99CC5B"type="submit">Envoyer</button></div>
                  </form>
            </div>
            </div>


 <div class="col-md-6">
    <div class="info-box ">
        <div class="col-md-11">
        <i class="bi bi-lightbulb-fill"></i>
      <h3 >Elements De Compétence</h3>
      <p style="margin: 20px" class="text-success small">vous pouvez donner votre avis sur un élement de compétence correspondant à la formation sélectionné </p>
            <form action="{{route("store_feed",$specialite->id)}}" method="post"  >
                @csrf
             <select class="form-control "style="margin: 8px;"  name="elementcompetence_id" >
               <option value=""></option>
                @foreach ($specialite->metiers as $data )
                @foreach ($data->missions as $comp )
                @foreach ($comp ->competences as $comp )
                @foreach ($comp->elementcompetences as $data )
                <option value="{{$data->id}}"> {{$data->intitule}} </option>
                @endforeach
                @endforeach
                @endforeach
                @endforeach
             </select>
             <input type="radio" id="star5" class="rate" name="rating" value="0" hidden/>
             {{--
             <div class="rate">
                <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                <label for="star5" title="text">5 stars</label>
                <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" class="rate" name="rating" value="2">
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                <label for="star1" title="text">1 star</label>
             </div>--}}

             <input type="text" name="competence_id" value="" hidden>
             <div class="form-group" style="margin: 25px">
                <textarea class="form-control " name="commentaire" rows="5" placeholder="commentaire..." required></textarea>
              </div> <br>
            <div class="text-center"><button class="btn color-99CC5B"type="submit">Envoyer</button></div>
          </form>
    </div>
    </div>
 </div></div></div>
        </div>
 <br><br>
 <div class="row">

    <div class="col-lg-6">

      <div class="row">
        <div class="col-md-12">
          <div class="info-box">
         <div class="col-md-10">

          <h3>Commenter <i class="bi bi-message"></i></h3>
        <form action="{{route("store_feed",$specialite->id)}}" method="post"  >
            @csrf
            <div class="rate">
                <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                <label for="star5" title="text">5 stars</label>
                <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" class="rate" name="rating" value="2">
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                <label for="star1" title="text">1 star</label>
             </div>
              <div class="form-group" style="margin-left: 30px">
                <textarea class="form-control " name="commentaire" rows="5" placeholder="commentaire..." required></textarea>
              </div>



              <input type="text" name="competence_id" value="" hidden>
              <input type="text" name="elementcompetence_id" value="" hidden>

<br>
              <div class="text-center"><button class="btn color-99CC5B"type="submit">Envoyer</button></div>
            </form>
    </div>

    </div>




  </div>

  </div>
    </div>




</div>
<br>
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
