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


<body>


 <div class="container">
  <header style="background-color: wheat">
    <h3 class="text-center"> Rapport 
</h3>

</header>
<p>

    <h5 style="color: rgb(90, 89, 88)">Responsable De Master  :</h5>
    @foreach ($data as $remarque )
    @endforeach

   <strong>   {{$remarque->user->nom}} {{$remarque->user->prenom}}</strong>


</p>

 


 <p>
    <h4 class="text-center"> Fiche De Rapport</h4>
 </p>
</div>
        <div class="container">
         <table class="table table-bordered">
            <thead>
                <tr>
                  <th >Type Utilisateur</th>
                  <th >Date-remarque</th>
                  <th  >Remarque</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($data as $remarque )
                 <tr>
                      <td>{{$remarque->feedback->user->type}} </td>
   
                          <td>{{$remarque->created_at->format('d/m/y')}}</td>
                          <td >{{$remarque->description}}</td>




                      </tr>

                      @endforeach
                   </tbody>
                   


</table>

 
</body>
</html>
