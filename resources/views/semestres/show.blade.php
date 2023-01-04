
@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href={{route('dash')}}>Home</a></li>
          <li class="breadcrumb-item active"><a href="{{route('semestres.index')}}">Semestre</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-8">



        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Programme semestriel</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                    <table class="table table-bordered">
                        <thead >
                          <tr>
                            <th  >Specialite :  {{$spec}}</th>
                          </tr>
                        </thead>

                        <thead >
                          <tr>
                            <th >semestre 1</th>
                          </tr>
                        </thead>
                        @foreach ($semestre as $s)
                          <tbody>
                            @if($s->code==1)
                         <tr>
                        <td>
                            <ol>
                                {{$s->module->titre}}
                            </ol>
                        </td>
                         </tr>
                         @endif
                            @endforeach
                        </tbody>
                        <thead >
                            <tr>

                              <th >semestre 2</th>
                            </tr>
                          </thead>
                            <tbody>
                              @foreach ($semestre as $s)
                              @if($s->code==2)

                           <tr>
                          <td>
                              <ol>
                                  {{$s->module->titre}}
                              </ol>

                            </td>
                           </tr>
                           @endif
                              @endforeach
                          </tbody>
                          <thead >
                            <tr>

                              <th >semestre 3</th>
                            </tr>
                          </thead>
                            <tbody>
                              @foreach ($semestre as $s)
                              @if($s->code==3)
                           <tr>
                          <td>

                              <ol>
                                  {{$s->module->titre}}
                              </ol>

                            </td>
                           </tr>
                           @endif
                              @endforeach
                          </tbody>









                    </table>


                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

@include('adminDash.footerAD')
