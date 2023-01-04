@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>
          Les Prerequis
        </h1>
        <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dash')}}">Home</a></li>
         <li class="breadcrumb-item active"> Prerequis

        </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">

                <h5 class="card-title">Modules | Prerequis </h5>
                <!-- Table with stripped rows -->
                <table class="table">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th >module</th>
                       <th>Prerequis</th>
                      <th width="300px">Option</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $i=0;
                      @endphp

                   @foreach ($module as $module )


                    <tr>
                        <td>{{++$i}}</td>
                        <td> {{$module->titre}}  </td>


                    <td>
                  {{$module->prerequis->pluck('prerequis')->first()}}
               </td>

                <td>
                    <form action="{{ route('prerequis.destroy',$module->id)}}" method="POST">

                        <a class="btn btn-success" href="{{route('create_prerequis',$module->id)}}">ajouter </a>
                        <?php

                        $prereq=$module->prerequis->pluck('id')->first();
                         ?>

                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Supprimer</button>
                      </form>


            </td>
             </tr>
                  </tbody>


                  @endforeach
                </table>
  <p>

  <cite>

  </cite>




  </p>

            </div>

          </div>
        </div>
      </section>


  </main><!-- End #main -->


@include('adminDash.footerAD')

