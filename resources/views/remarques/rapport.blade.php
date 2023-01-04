<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Template Main CSS File -->
  <link href="{{asset('assets/lib/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
</head>
<body>


 <div class="container">
  <header style="background-color: wheat">

  <h3 class="text-center"> Rapport </h3>
</header>
<p>

    <h5 style="color: rgb(90, 89, 88)">Responsable De Master  :</h5>
    @if($data->count()>0)
    @foreach ($data as $remarque )
 @endforeach

    <strong>   {{$remarque->user->nom}} {{$remarque->user->prenom}}</strong>
    @else
    introuvble
    @endif


</p>




 <p>
    <h4 class="text-center"> Fiche De Rapport</h4>
 </p>
</div>
        <div class="container">
         <table class="table table-bordered">
            <thead>
                <tr>
                  <th colspan=1 >Type Utilisateur</th>
                  <th colspan=1>Date-remarque</th>
                  <th colspan=6 >Remarque</th>

                </tr>
            </thead>
            <tbody>
                @if($data->count()>0)
                @foreach ($data as $remarque )

                 <tr>
                      <td colspan=1>{{$remarque->feedback->user->type}} </td>

                          <td>{{$remarque->created_at->format('d/m/y')}}</td>
                          <td >{{$remarque->description}}</td>




                      </tr>

                   </tbody>
                   @endforeach
                   @else
                   introuvable
                    @endif


</table>
<br>
<a href="{{route('pdfRapport')}}" class='btn btn-danger'>
  <i class="bi bi-file-pdf-fill"></i>
  Télecharger</a>
</body>
</html>
