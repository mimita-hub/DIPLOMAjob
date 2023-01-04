@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>

        </h1>
        <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Liste Modules


        </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body" >

  <h5 class="card-title"> modules-Options</h5>
  <div  style="display: inline-block">
    <form class="search-form d-flex" method="GET" action="{{route('search_module')}}">
      <input class="form-control" type="search" name="search" > &nbsp;
      <button type="submit" class="btn btn-info"><i class="bi bi-search"></i></button>
    </form>

</div>
<a class="btn btn-primary "style="display: inline-block " href="{{route('detailsModule')}}">Details Module</a>

  <div>
    <br>
    <table class="table table-bordered">

        <thead>
        <tr>
            <th>#</th>
            <th>module</th>



        <th width="480px">Option</th>
    </tr>
  </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp

                @foreach ($data as $module)
                <tr>
                <td>{{++$i}}</td>
                <td>{{$module->titre}}</td>
                <td>
                <form action="{{ route('moduls.destroy',$module->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{route('moduls.edit',$module->id)}}"> Modifier</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
                </tr>

</tbody>
@endforeach
@forelse ($data as $module)
      @empty
         <p class="aler alert-danger"><strong> {{request()->query('search')}}</strong>   introuvable </p>
     @endforelse

    </table>



  </div>



  <!-- Table :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->






              </div>
            </div>

          </div>
        </div>
      </section>


  </main><!-- End #main -->


@include('adminDash.footerAD')

