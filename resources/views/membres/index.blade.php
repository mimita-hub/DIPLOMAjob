@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>gestion membres</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</a></li>
          <li class="breadcrumb-item active">Membres</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Membres</h5>
                 <br><br>
                 @if ($message = Session::get('success'))
                 <div class="alert alert-success">
                     <p>{{ $message }}</p>
                 </div>
             @endif
                <!-- Table with stripped rows -->
                <table class="table">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th >Nom</th>
                      <th >Prenom</th>
                      <th >Adresse mail</th>
                      <th >role</th>


                      <th width="480px">Option</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $i=0;
                      @endphp
                    @foreach ($data as $user)
                      <tr>
                    <td>{{++$i}}</td>
                    <td>{{$user->nom}}</td>
                    <td>{{$user->prenom}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->type}}</td>
                    <td>
                        <form action="{{ route('User.destroy',$user->id) }}" method="POST">

                            <a class="btn btn-primary" href="{{route('User.show',$user->id)}}">Details</a>
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Supprimer</button>
                          </form>
                    </td>
                    </tr>

                  </tbody>
                  @endforeach
                </table>
                <!-- End Table with stripped rows -->

              </div>
            </div>

          </div>
        </div>
      </section>


  </main><!-- End #main -->


@include('adminDash.footerAD')

