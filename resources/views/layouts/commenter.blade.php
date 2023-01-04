@include('home.head')
<main id="main">
    <style>.color-99CC5B{background-color:#ff864e;}</style>
    <section class="breadcrumbs">
        <div class="container">

          <div class="d-flex justify-content-between align-items-center">
            <h2>Votre Avis est important pour nous </h2>

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
                <div class="col-md-6">
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <div class="info-box mt-10">

                        <i class="bi bi-lightbulb"></i>
                      <h3>Compétence</h3>
                      <p>vous pouvez donner votre avis sur une compétence correspondant à la formation sélectionné </p>

                       <button type="button" class="btn color-99CC5B" data-bs-toggle="collapse" data-bs-target="#competence">commenter</button>
<br><br><br>
                       </div>

                  </div>
                </div>
               </div>


          <div class="col-md-6">
            <div class="info-box mt-10">
                <i class="bi bi-lightbulb-fill"></i>
              <h3>Elements De Compétence</h3>
              <p>vous pouvez donner votre avis sur un élement de compétence correspondant à la formation sélectionné </p>

               <button type="button" class="btn color-99CC5B" data-bs-toggle="collapse" data-bs-target="#element">commenter</button>
            <div id="element" class="collapse">
                <form  method="post" class="php-email-form">
                     <label for=""> Element De compétence:</label>


                     <select class="form-control" name="" id="">
                        <option value="">competence 1</option>
                        <option value="">competence 2</option>
                        <option value="">competence 3</option>
                     </select>
                     <br>
                     <label for=""></label>
                      <textarea class="form-control" name="message" rows="5" placeholder="commentaire..." required></textarea>
                    <br>
                    <div class="text-center"><button type="submit">Envoyer</button></div>
                  </form>
            </div>
            </div>
          </div>

          </div>
            </div></div>
 <br>
        <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="info-box mt-10">
        <form action="{{route("store_feed",$specialite->id)}}" method="post"  >
        @csrf
          <div class="form-group ">
            <textarea class="form-control " name="commentaire" rows="5" placeholder="commentaire..." required></textarea>
          </div>
          <div class="my-3" >
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
          </div>


          <div class="text-center"><button class="btn color-99CC5B"type="submit">Envoyer</button></div>
        </form>
      </div>

    </div>
        </div>
    </section>
    <br><br><br><br><br><br>
    <div id="competence" class="collapse">

        <label for=""> Compétence:</label>
       <select class="form-control" name="" id="">
           <option value="">competence 1</option>
           <option value="">competence 2</option>
           <option value="">competence 3</option>
        </select>
        <br>
        <label for=""></label>
         <textarea class="form-control" name="message" rows="5" placeholder="commentaire..." required></textarea>
       <br>
       <div class="text-center"><button type="submit">Envoyer</button></div>

</div>

















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
