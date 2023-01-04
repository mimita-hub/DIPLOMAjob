@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>
          Mes Feeds Backs
        </h1>
        <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">

        </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">

                <h5 class="card-title"> Liste Des FeedBacks</h5>

                <!-- Table with stripped rows -->
                <table class="table">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th >FeedBack</th>
                      <th>Specialité</th>
                      <th>date</th>
                      <th>Utilisateur</th>
                      @if(Auth::user()->type=="respSpecialite")
                      <th width="250px">Option</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $i=0;
                      @endphp
                    @if($data->count()>0)
                    @foreach ($data as $feed)

                    @if($feed->specialite->departement->user_id==Auth::id())
                    <tr>
                        <td>{{++$i}}</td>
                        <td width="250px"> <button type="button" class="btn btn-light" data-bs-toggle="collapse" data-bs-target="#feed">voir</button></td>


                    <td>{{$feed->specialite->nomSpecialite }}</td>
                    <td>{{$feed->created_at->format('d/m/y')}}</td>

                    <td width="250px"> <button type="button" class="btn btn-info" data-bs-toggle="collapse" data-bs-target="#element">Details</button></td>
                    </tr>
                    @endif
                    @if($feed->specialite->user_id==Auth::id())
                    <tr>
                        <td>{{++$i}}</td>
                        <td width="250px"> <button type="button" class="btn btn-light" data-bs-toggle="collapse" data-bs-target="#feed">voir</button></td>
                        <td>{{$feed->specialite->nomSpecialite }}</td>
                        <td>{{$feed->created_at->format('d/m/y')}}</td>

                        <td width="250px"> <button type="button" class="btn btn-info" data-bs-toggle="collapse" data-bs-target="#element">Details</button></td>

                        <td>
                        <a class="btn btn-primary" href="{{route('create_remarque',$feed->id)}}">Remarque</a>
                        </td>
                   </tr>

                  @endif
                </tbody>
                     @endforeach
                     <div class="alert alert-info" id="element" class="collapse" >
                        <h4>Details De l'utilisateur qui a met ce feed back:</h4>
                        <ul>
                            <li> Nom: {{$feed->user->nom}}</li>
                            <li> Email:{{$feed->user->email}}</li>
                            <li> Type: {{$feed->user->type}}</li>
                        </ul>

                        </div>
                    <div class="alert alert-light" id="feed" class="collapse">
                        <h4>Commentaire</h4>
                      <p>
                     <strong>Date:</strong>  {{$feed->created_at}} <br>
                     <strong>Specialité:</strong>  {{$feed->specialite->nomSpecialite}}
                      </p>
                      <p>
                        <strong>Description :</strong> <br>   {{$feed->commentaire}}
                      </p>

                        </div>

                    @else
                    introvable
                    @endif

                    </table>
                <!-- End Table with stripped rows -->
              </div>
            </div>

          </div>
        </div>
      </section>


  </main><!-- End #main -->


@include('adminDash.footerAD')

