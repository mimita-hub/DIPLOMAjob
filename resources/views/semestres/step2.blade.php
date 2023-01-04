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
                        <input placeholder="2" type="text" name="code" value="2" class="form-control">

                    </div>




   <div class="col-10">
    <label class="form-label" for="type">Module : </label>
    <br>
    <select id='myselect'class="form-control" name="module_id[]" multiple>
      <option value="">Select An Option</option>
      
      @foreach($modulePrerequis as $mod)
      @foreach($module as $m)
     
      @if($mod->module_id == $m->id )
      <?Php $id=$m->id;
      $x=$mod->module_id;?>
      @if($x==$id )
      <option value={{$m->id}}>{{ $m->titre }}</option>
     
      @endif @endif
       @endforeach
      @endforeach
    </select>
</div>

                    <script>
                        $('#myselect').select2({
                            width: '100%',
                            placeholder: "Select an Option",
                            allowClear: true
                        });
                        </script>


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

