
@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1> DashBoard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dash')}}">Home</a></li>

          <li class="breadcrumb-item active">Dashboard</li>

        </ol>
      </nav>

@if(Auth::user()->type=="univAdmin" ||Auth::user()->type=="respSpecialite" || Auth::user()->type=="responsable_rh")
<section class="section dashboard">

    {{--*************************************             specialite      *************************************************** --}}


    @if(Auth::user()->type=="respSpecialite")


  <div class="row">

          <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">
         <!-- Sales Card -->
         <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Modules <span>|</span></h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-file-earmark"></i>
                  </div>
                  <div class="ps-3">
                    <h6>
{{$module}}


                                        </h6>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->
            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">

                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>
                    </ul>
                  </div>
                    <div class="card-body">
                    <h5 class="card-title">Feedbacks <span></span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-chat-left-dots"></i>
                      </div>
                      <div class="ps-3">
                        <h6>
{{$feed}}
                        </h6>

                      </div>
                    </div>
                  </div>

                </div>
              </div><!-- End Revenue Card -->


            </div></div></div>



            <div id="container"></div>
<body>

  <script src="https://code.highcharts.com/highcharts.js"></script>
            <script type="text/javascript">
                var userData = <?php echo json_encode($userData)?>;
                Highcharts.chart('container', {
                    title: {
                        text: 'Feedbacks 2022'
                    },
                    subtitle: {
                        text: <?php echo json_encode($nomSpecialite)?>
                    },
                    xAxis: {
                        categories: ['septembre', 'Octobre', 'Novembre', 'Décembre']

                    },
                    yAxis: {
                        title: {
                            text: 'Nombre de feedbacks '
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },
                    plotOptions: {
                        series: {
                            allowPointSelect: true
                        }
                    },
                    series: [{
                        name: 'Nombre de feedbacks',
                        data: userData
                    }],
                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    },

                });
            </script>
</body>
            @endif




{{--*************************************                 Universite      *************************************************** --}}
@if(Auth::user()->type=="univAdmin")
<div class="row">

    <!-- Left side columns -->
<div class="col-lg-8">
  <div class="row">
   <!-- Sales Card -->
   <div class="col-xxl-4 col-md-6">
      <div class="card info-card sales-card">

        <div class="card-body">
          <h5 class="card-title">Facultés <span>|</span></h5>
          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-building"></i>
            </div>
            <div class="ps-3">
              <h6>


          {{$fac}}

                                  </h6>

            </div>
          </div>
        </div>

      </div>
    </div><!-- End Sales Card -->

      <div class="col-xxl-4 col-md-6">
        <div class="card info-card revenue-card">

            <div class="card-body">
            <h5 class="card-title">Departements <span></span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-building"></i>
              </div>
              <div class="ps-3">
                <h6>
                    {{$depart}}
                </h6>

              </div>
            </div>
          </div>

        </div>
      </div><!-- End Revenue Card -->


      </div></div></div>
      @endif








 @if(Auth::user()->type=="responsable_rh")
    <div class="row">

<!-- Left side columns -->
<div class="col-lg-8">
<div class="row">
<!-- Sales Card -->
<div class="col-xxl-4 col-md-6">
  <div class="card info-card sales-card">

    <div class="card-body">
      <h5 class="card-title">Métier <span>|</span></h5>
      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-award-fill"></i>
        </div>
        <div class="ps-3">
          <h6>


      {{$metier}}

                              </h6>

        </div>
      </div>
    </div>

  </div>
</div><!-- End Sales Card -->
<div class="col-xxl-4 col-md-6">
        <div class="card info-card revenue-card">

            <div class="card-body">
            <h5 class="card-title">Offre D'emploi <span></span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-briefcase-fill"></i>
              </div>
              <div class="ps-3">
                <h6>
                    {{$offre}}
                </h6>

              </div>
            </div>
          </div>

        </div>
      </div><!-- End Revenue Card -->

      @endif
      </div></div></div>



</section>
@endif
    </div>


  </main><!-- End #main -->


@include('adminDash.footerAD')

