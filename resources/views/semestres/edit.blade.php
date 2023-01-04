b
@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Module</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</a></li>
          <li class="breadcrumb-item active">Formations</li>
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

                    <div class="col-10">
                        <label class="form-label" for="type">Semestre : </label>
                        <select name="code"  class="form-control">
                        
                        <option value={{$semestre->code}}>{{$semestre->code}}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>

                        </select>
                      </div>


   <div class="col-10">
            <label class="form-label" for="type">Module : </label>
            <br>
        <select class="form-control" name="module_id[]" >
            <option value={{$semestre->module->titre}}>---</option>
            <?php $i=0;
                $x=0;
                $y=0;
                ?>
           @foreach($modulePrerequis as $mod)
           @foreach($module as $m)
           @if($mod->module_id != $m->id )
           <?Php $id=$m->id;
           $x=$mod->module_id;?>
           @if($x!=$id )
           <option value={{$m->id}}>{{ $m->titre }}</option>
          
         
           @else 
           <?php echo '<option> hi</option>'?>
           @endif @endif
                @endforeach
           @endforeach
           </select>

    </div>
{{--
   <script type='text/javascript'>
     $(document).ready(function(){

      // Department Change
      $('#sel_semestre').on('change', function () {
                var  code=$this.value();

                $('#sel_semestre').find('option').not(':first').remove();

                $.ajax({
                    url: '{{route('semestres.create.step2')}}',
                    type: 'get',
                    success: function(response){

                      var response = JSON.parse(response);
                      console.log(response);
                      $("#sel_module").append(`<option value="0" disabled selected> selectionnez un module</option>`);
                      response.forEach( element =>
                    $("#sel_module").append(`<option value="${element['id']}">${element['name']}</option>`);   )};

                });
                });
            }
        );



   </script>
--}}


                    </div>

             <br>


              <div class="col-10">
                <button class="btn btn-primary w-100" type="submit">valider</button>
              </div>
                </form>



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

                 </div>
                </div>
              </div>
          </div>
        </div>
      </section>


  </main><!-- End #main -->


@include('adminDash.footerAD')

