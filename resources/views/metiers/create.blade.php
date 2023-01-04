@include('home.head')

<main id="mainmetier">
  <br>
  <br>
  <div class="createmetier">

      <h1>Descriptif de fiche metier</h1>
       <hr>

       <form method="post" action="{{route('metiers.store')}}">
        @csrf
        <span class="title"> Métier</span>
        <br>
        <div class="form-group">
          <input   id="titremetier"type="text" placeholder="Nom du Métier" class="@error('titremetier') is-invalid @enderror" name="titremetier" value="{{ old('titremetier') }}" required autocomplete="titremetier" autofocus>
      @error('nom')
        <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
        </span>
      @enderror
      </div>
      <div class="form-group">
           <textarea id="descriptionmetier" placeholder="description"  class=" @error('descriptionmetier') is-invalid @enderror" name="descriptionmetier"  rows="4"></textarea>

           @error('descriptionmetier')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
           @enderror

        </div>

        <hr>


        <span class="title"> Missions</span>

        <button id="addMission" type="button" class="btn btn-danger addmission"><i class="bi bi-plus-lg"></i>Ajouter</button>

        <div id="inputFormRow">
          <div class="">
           1
              <input   type="text" placeholder="Mission"  name="description[]" class="m-input" autocomplete="off" >
              <div class="input-group-append  remove">
                  <button id="removeRow" type="button" class="btn btn-danger "><i class="bi bi-x-lg"></i>Supprimer</button>
              </div>
          </div>
      </div>


      <div id="newMission"></div>

 <br>
 <hr>

 <span class="title">  Competences</span>

 <button id="addCompetence" type="button" class="btn btn-danger addmission" > <i class="bi bi-plus-lg"></i>Ajouter</button>
 <div id="inputFormRow">
  <div class="">

   1
      <input   type="text" placeholder="Competence" class="nb" name="intitule[]" >
      <input   type="text" placeholder="Numéro de Mission" class="nombre" name="id[]" >
      <div class="input-group-append  remove">
          <button id="removeRow" type="button" class="btn btn-danger "><i class="bi bi-x-lg"></i>Supprimer</button>
      </div>
  </div>
</div>
<div id="newCompetence"></div>
<br>
<hr>

<span class="title">  Element de comptence</span>

  <button  id="addElement" type="button" class="btn btn-danger addmission" > <i class="bi bi-plus-lg"></i>Ajouter</button>

<div id="inputFormRow">

<div class="form-group ">
  <input   type="text" placeholder=" Element de Competence"  name="element[]" >
  <div class="remove ">
   <button id="removeRow" type="button" class="btn btn-danger"><i class="bi bi-x-lg"></i>   Supprimer</button>
   </div>


</div>


<select   name="niveau[]">
<option selected>Niveau</option>
<option>Base</option>
<option>Intermédiaire</option>
<option>Avancé</option>
</select>

<input   type="text" placeholder="  Numéro de competence" class="nombrecompetence" name="idElement[]" >

<div class="form-group ">
<textarea id="descriptionmetier" placeholder="objectif"   name="objectif[]"  rows="4"></textarea>
</div>

</div>
<div  id="newElement"></div>
<br>
<hr>
<br>
<button  type="sumbit"   id="save" class="valide">envoyer</button>
<br>
<br>

</div>


     </form>
  </div>

  </div>
<br>
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






  <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>







      <script type="text/javascript">
          // add row
          $(document).ready(function(){


            var i=1;
            var j=1;
          $("#addMission").click(function () {
              var html = '';


              html += '<div id="inputFormRow">';
            html += '<div class="">';

            html +=++i ;
            html += ' <input   type="text" placeholder="Mission"  name="description[]" class="m-input" autocomplete="off" >';
            html += '<div class="input-group-append remove">';
            html += '<button id="removeRow" type="button" class="btn btn-danger"><i class="bi bi-x-lg"></i>Supprimer</button>';
            html += '</div>';
            html += '</div>';

              $('#newMission').append(html);
          });

          $("#addCompetence").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="">';
              html +=++j ;
            html += '<input   type="text" placeholder="Competence" class="nb" name="intitule[]" >';
            html += ' <input   type="text" placeholder="Numéro de Mission" class="nombre" name="id[]" >';
            html += '<div class="input-group-append remove">';
            html += '<button id="removeRow" type="button" class="btn btn-danger"><i class="bi bi-x-lg"></i>Supprimer</button>';
            html += '</div>';
            html += '</div>';

            $('#newCompetence').append(html);
        });
$("#addElement").click(function () {
    var html = '';
    html += '<div id="inputFormRow">';
    html += '<div class="form-group ">';
    html += '<input   type="text" placeholder=" Element de Competence" name="element[]" >';
    html += ' <div class="input-group-append remove ">';
    html += '   <button id="removeRow" type="button" class="btn btn-danger"><i class="bi bi-x-lg"></i> Supprimer</button>';
    html += '  </div>';
    html += '</div>';
    html+='<select name="niveau[]">';
      html += '<option selected>Niveau</option>';
    html += '  <option>Base</option>';
    html += ' <option>Intermédiaire</option>';
    html += '<option>Avancé</option>';
    html+='</select>'
    html+='<input   type="text" placeholder="  Numéro de competence" class="nombrecompetence" name="idElement[]" >';
    html += '<div class="form-group ">';
    html+='<textarea id="descriptionmetier" placeholder="objectif"   name="objectif[]"  rows="4"></textarea>';
    html += '</div>';
    html += '</div>';
    $('#newElement ').append(html);
});

          // remove row
          $(document).on('click', '#removeRow', function () {
              $(this).closest('#inputFormRow').remove();
          });



        });

      </script>


</body>

</html>
