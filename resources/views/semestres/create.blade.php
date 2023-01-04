@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Ajouter Semestre</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</a></li>
          <li class="breadcrumb-item active">Programmation des semestres</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section  " >
        <div class="row">
          <div class="col-lg-12">

            <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Programmation des semestres </h5>

                  </div>
                  @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                      <p>{{ $message }}</p>
                  </div>
              @endif

              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif



                    <div class="col-10">
                      <form method="POST" action="{{route('semestres.store')}}"  >
                       @csrf

                    <div class="col-6">
                      <div class="mb-3">
                          <select name="code"class="form-select semester" aria-label="Default select">
                              <option selected disabled>selectionnez un semestre</option>
                              <option value="1">semestre 1</option>
                              <option value="2">semestre 2</option>
                              <option value="3">semestre 3</option>
                          </select>
                      </div>
                      <div class="mt-3 mb-3">
                          <select  name="module_id[]"class="form-control myselect"aria-label="Default select example" id="resultat" multiple>
                          </select>
                      </div>
                  </div>
                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

                    <script>

                      $(document).on('change', '.semester', function(e) {

                          var value = $(this).val();

                          $(document).ready(function() {

                              $.ajax({
                                  url: "/resultat",
                                  method: "GET",
                                  data: { value: value },
                                  success: function(result) {
                                      $('#resultat').html(result);

                                  }

                              })
                          });

                      });

                  </script>


                    <script>
                      $('.myselect').select2({
                          width: '100%',

                          allowClear: true
                      });
                      </script>

   {{--<div class="col-10">
            <label class="form-label" for="type">Module : </label>
            <br>
        <select class="form-control" name="module_id[]" >
            <option>---</option>
            < ?php $i=0;
                $x=0;
                $y=0;
                ?>
           @foreach($modulePrerequis as $mod)
           @foreach($module as $m)
           @if($mod->module_id != $m->id )
           < ?Php $id=$m->id;
           $x=$mod->module_id;?>
           @if($x!=$id )
           <option value={{$m->id}}>{{ $m->titre }}</option>


           @else
           < ?php echo '<option> hi</option>'?>
           @endif @endif
                @endforeach
           @endforeach
           </select>

    </div>


                    </div>

             <br>






                   <!-- Table with stripped rows
                <section class="section">
                    <div class="row">
                      <div class="col-lg-12">

                        <div class="card">
                          <div class="card-body">

                            <h5 class="card-title"> Liste Des Remarques</h5>

                            < !-- Table with stripped rows
                            <table class="table">
                              <thead>
                                <tr>
                                  <th >#</th>
                                  <th >semestre</th>
                                  <th >module</th>

                                  <th width="250px">Option</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @ php
                                      $i=0;
                                  @ endphp

                                @ foreach ($prerequis as $prerequis)
                                <tr>
                                    <td>{ {++$i}}</td>
                                    <td>{ {$prerequis->modules}}</td>
                                    <td>{ {$prerequis->prerequis}}</td>


                                </tr>
                              </tbody>
                              @ endforeach
                            </table>


                             End Table with stripped rows
                          </div>
                        </div>

                      </div>
                    </div>
                  </section> -->
--}}    <div class="col-10">
  <button class="btn btn-primary w-100" type="submit">valider</button>
</div>
  </form>


                 </div>
                </div>
              </div>
          </div>
        </div>
      </section>


  </main><!-- End #main -->


@include('adminDash.footerAD')

