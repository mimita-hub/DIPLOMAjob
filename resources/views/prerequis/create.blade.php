@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Les Prerequis</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</a></li>
          <li class="breadcrumb-item active">Prerequis</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section  " >
        <div class="row">
          <div class="col-lg-12">

            <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Prerequis </h5>

                  </div>
                  @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                      <p>{{ $message }}</p>
                  </div>
              @endif

                  <div class="col-10">
                   <form method="POST" action="{{route('store_prerequis',$data->id)}}" id="ok"  >
                    @csrf

                    <div class="col-10">

                        <label > <strong> {{$data->titre}}/{{$data->id}} :</strong></label>
                            <div class="form-check">
                                   @foreach ($modules as $mod)


                                 <label class="form-check-label" ><input class="form-check-input" type="checkbox" name="prerequis[]" value="{{$mod->titre}}" >  {{$mod->titre}}
                                </label> <br>
                                @endforeach

                              </div>


                        <br>


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
                                  <th >module</th>
                                  <th >prerequis</th>

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

