<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ma Formation </title>
    <!-- Template Main CSS File -->
  <link href="{{asset('assets/lib/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
</head>
<style>
    div.solid {border-style: solid;}
    h3.double {border-style: double;}
</style>
<body>


 <div class="container ">
<br>
  <h3 class="double text-center"style=" background-color:rgb(641, 236, 225);">Master: <?php foreach ($specialite as $key => $value) {
     echo $value->nomSpecialite;
} ?>

</h3>
</header>


 <p>
    <h5 style="color: rgb(90, 89, 88)"><strong>Description :</strong></h5> <?php foreach ($specialite as $key => $value) {
       echo $value->description;

     } ?>
</p>


<p>
    <h5 style="color: rgb(90, 89, 88)"><strong>Objectifs :</strong></h5> <?php  foreach ($specialite as $key => $value) {
 echo $value->objectifs;
    }
  ?>

</p>

<p>
    <h5 style="color: rgb(90, 89, 88)"><strong>Pré-requis :</strong></h5> <?php  foreach ($specialite as $key => $value) {
echo $value->prerequis;
    }
  ?>

</p>

<p>
    <h5 style="color: rgb(90, 89, 88)"><strong>Secteurs Professionnels :</strong></h5> <?php  foreach ($specialite as $key => $value) {
 echo $value->secteurs;
    }
  ?>

</p>
<p>

    <h5 style="color: rgb(90, 89, 88)"> <strong>Métier :</strong> </h5>
    @foreach ($specialite as $data )
     @foreach ($data->metiers as $data )
     {{$data->titre}}
      @endforeach
       @endforeach

</p>

<div style="page-break-before: always;"></div>
 <p>
    <h4 class="text-center">Fiche d'organisation semestrielle des enseignements: </h4>
 </p>

        <div class="container">

            <h5 ><strong>Semestre 1 :</strong> </h5>
            <br>
         <table class="table table-bordered">
            <thead>
                <tr>
                 <th> Unité D'Enseignement</th>
                  <th >VHS</th>
                  <th colspan="3">  VH hebdomadaire</th>
                  <th >Coeff</th>
                  <th >Crédit</th>
                  <th >Element De Competence</th>
                <tr>
                  <th></th>
                   <th></th>
                   <th >C</th>
                   <th >TD</th>
                   <th>TP</th>
                   <th></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th style="background-color: rgb(241, 236, 225)" colspan="8"> {{ "UE Fondamentales"}}   </th>
               </tr>
            </thead>

            <tbody>
                @foreach ($semestre1 as $semestre)
                @if($semestre->code==1)

                 <tr>
                  @if($semestre->Module->unite=="UEF")

                          <th>{{$semestre->Module->titre}}</th>
                          <th>{{$semestre->Module->vsh."h"}}</th>
                          <th><?php if($semestre->Module->C==60)
                            echo '1h';
                          elseif ($semestre->Module->C==90) {
                            echo '1h30';
                          }elseif ($semestre->Module->C==120) {
                            echo '2h';
                          }elseif ($semestre->Module->C==150){
                            echo '2h30';
                          }elseif ($semestre->Module->C==180) {
                            echo '3h';
                          }elseif ($semestre->Module->C==0)

                          echo $semestre->Module->C."h" ; ?>
                          </th>
                      <th><?php if($semestre->Module->TD==60)
                        echo '1h';
                      elseif ($semestre->Module->TD==90) {
                        echo '1h30';
                      }elseif ($semestre->Module->TD==120) {
                        echo '2h';
                      }elseif ($semestre->Module->TD==150){
                        echo '2h30';
                      }elseif ($semestre->Module->TD==180) {
                        echo '3h';
                      }elseif ($semestre->Module->TD==0)

                      echo $semestre->Module->TD."h" ;
                      ?>
                      <th><?php if($semestre->Module->TP==60)
                        echo '1h';
                      elseif ($semestre->Module->TP==90) {
                        echo '1h30';
                      }elseif ($semestre->Module->TP==120) {
                        echo '2h';
                      }elseif ($semestre->Module->TP==150){
                        echo '2h30';
                      }elseif ($semestre->Module->TP==180) {
                        echo '3h';
                      }elseif ($semestre->Module->TP==0)

                      echo $semestre->Module->TP."h" ;
                      ?><th>{{$semestre->Module->coeff}}</th>
                          <th>{{$semestre->Module->credit}}</th>
                          <th style="color: blue">
                                @foreach ($semestre->Module->elementcompetences as $elementCompetence )
                               {{$elementCompetence->intitule}}

                                  @endforeach</th>

                          @endif
                      </tr>

                     @endif

                     @endforeach
                   </tbody>
                   <thead>
                    <tr>
                        <th style="background-color: rgb(241, 236, 225)" colspan="8">{{"UE Methodologiue"}}</th>

                   </tr>
                  </thead>
                  <tbody>
                    @foreach ($semestre1 as $semestre)


                        @if($semestre->Module->unite=="UEM")

                         <th>{{$semestre->Module->titre}}</th>
                         <th>{{$semestre->Module->vsh."h"}}</th>
                         <th><?php if($semestre->Module->C==0) echo $semestre->Module->C; else  echo $semestre->Module->C."h" ; ?></th>
                         <th><?php if($semestre->Module->TD==0) echo $semestre->Module->TD; else  echo $semestre->Module->TD."h" ; ?></th>
                         <th><?php if($semestre->Module->TP==0) echo $semestre->Module->TP; else  echo $semestre->Module->TP."h" ; ?></th>
                         <th>{{$semestre->Module->coeff}}</th>
                         <th>{{$semestre->Module->credit}}</th>
                         <th style="color: blue">
                            @foreach ($semestre->Module->elementcompetences as $elementCompetence )
                             {{$elementCompetence->intitule}}

                              @endforeach</th>

                         @endif
                     </tr>

                    @endforeach
                  </tbody>

                  @foreach ($semestre1 as $semestre)

                  @if($semestre->Module->unite=="UED")

                  <thead>
                    <tr>
                        <th style="background-color: rgb(241, 236, 225)" colspan="8">
                            {{ "UE Découverte"}}
                        </th>

                   </tr>
                  </thead>
                  @endif
                  @endforeach
                  <tbody>
                    @foreach ($semestre1 as $semestre)

                  @if($semestre->Module->unite=="UED")
                         <tr>
                           <th>{{$semestre->Module->titre}}</th>
                              <th>{{$semestre->Module->vsh."h"}}</th>
                              <th><?php if($semestre->Module->C==0) echo $semestre->Module->C; else  echo $semestre->Module->C."h" ; ?></th>
                              <th><?php if($semestre->Module->TD==0) echo $semestre->Module->TD; else  echo $semestre->Module->TD."h" ; ?></th>
                              <th><?php if($semestre->Module->TP==0) echo $semestre->Module->TP; else  echo $semestre->Module->TP."h" ; ?></th>
                              <th>{{$semestre->Module->coeff}}</th>
                              <th>{{$semestre->Module->credit}}</th>
                              <th style="color: blue">
                                @foreach ($semestre->Module->elementcompetences as $elementCompetence )
                                 {{$elementCompetence->intitule}}

                                  @endforeach</th>

                          </tr>
                          @endif
                         @endforeach
                       </tbody>
                    </table>
     <!-- :::::::::::::::::::::::::::::::::::::::::::::::::: Semestre 2::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
           <hr>
           <h5 ><strong>Semestre 2 :</strong> </h5>
             <br>
                <table class="table table-bordered">
                  <thead class="sm">
                    <tr>
                      <th >Unité D'Enseignement</th>
                      <th >VHS</th>
                       <th colspan="3" class="text-center">  VH hebdomadaire</th>
                      <th >Coeff</th>
                      <th >Crédit</th>

                      <tr>
                         <th></th>
                         <th></th>
                         <th >C</th>
                         <th >TD</th>
                         <th>TP</th>
                         <th></th>
                      </tr>
                  </thead>
                    <!-- ----------------------------------::::::::::::::::------------------------------------------------ -->

                  <thead>
                    <tr>
                        <th style="background-color: rgb(241, 236, 225)" colspan="8"> {{ "UE Fondamentales"}}   </th>
                   </tr>
                  </thead>

                  <tbody>
                    @foreach ($semestre2 as $semestre)
                         <tr>
                            @if($semestre->Module->unite=="UEF")

                              <th>{{$semestre->Module->titre}}</th>
                              <th>{{$semestre->Module->vsh."h"}}</th>
                              <th><?php if($semestre->Module->C==60)
                                echo '1h';
                              elseif ($semestre->Module->C==90) {
                                echo '1h30';
                              }elseif ($semestre->Module->C==120) {
                                echo '2h';
                              }elseif ($semestre->Module->C==150){
                                echo '2h30';
                              }elseif ($semestre->Module->C==180) {
                                echo '3h';
                              }elseif ($semestre->Module->C==0)

                              echo $semestre->Module->C."h" ; ?>
                              </th>
                          <th><?php if($semestre->Module->TD==60)
                            echo '1h';
                          elseif ($semestre->Module->TD==90) {
                            echo '1h30';
                          }elseif ($semestre->Module->TD==120) {
                            echo '2h';
                          }elseif ($semestre->Module->TD==150){
                            echo '2h30';
                          }elseif ($semestre->Module->TD==180) {
                            echo '3h';
                          }elseif ($semestre->Module->TD==0)

                          echo $semestre->Module->TD."h" ;
                          ?>
                          <th><?php if($semestre->Module->TP==60)
                            echo '1h';
                          elseif ($semestre->Module->TP==90) {
                            echo '1h30';
                          }elseif ($semestre->Module->TP==120) {
                            echo '2h';
                          }elseif ($semestre->Module->TP==150){
                            echo '2h30';
                          }elseif ($semestre->Module->TP==180) {
                            echo '3h';
                          }elseif ($semestre->Module->TP==0)

                          echo $semestre->Module->TP."h" ;
                          ?> <th>{{$semestre->Module->coeff}}</th>
                              <th>{{$semestre->Module->credit}}</th>
                              <th style="color: blue">
                                @foreach ($semestre->Module->elementcompetences as $elementCompetence )
                                 {{$elementCompetence->intitule}}

                                  @endforeach</th>

                              @endif
                          </tr>

                         @endforeach
                       </tbody>
                       <!-- ----------------------------------::::::::::::::::------------------------------------------------ -->
                    <thead>
                    <tr>
                        <th style="background-color: rgb(241, 236, 225)" colspan="8">{{"UE Methodologiue"}}</th>

                   </tr>
                  </thead>
                  <tbody>
                  @foreach ($semestre2 as $semestre)
                    <tr>
                        @if($semestre->Module->unite=="UEM")

                         <th>{{$semestre->Module->titre}}</th>
                         <th>{{$semestre->Module->vsh."h"}}</th>
                         <th><?php if($semestre->Module->C==0) echo $semestre->Module->C; else  echo $semestre->Module->C."h" ; ?></th>
                         <th><?php if($semestre->Module->TD==0) echo $semestre->Module->TD; else  echo $semestre->Module->TD."h" ; ?></th>
                         <th><?php if($semestre->Module->TP==0) echo $semestre->Module->TP; else  echo $semestre->Module->TP."h" ; ?></th>
                         <th>{{$semestre->Module->coeff}}</th>
                         <th>{{$semestre->Module->credit}}</th>
                         <th style="color: blue">
                            @foreach ($semestre->Module->elementcompetences as $elementCompetence )
                             {{$elementCompetence->intitule}}

                              @endforeach</th>
                         @endif
                     </tr>

                    @endforeach
                  </tbody>
                    <!-- ----------------------------------::::::::::::::::------------------------------------------------ -->

                  @foreach ($semestre2 as $semestre)
                  @if($semestre->Module->unite=="UED")

                  <thead>
                    <tr>
                        <th style="background-color: rgb(241, 236, 225)" colspan="8">
                            {{ "UE Découverte"}}
                        </th>

                   </tr>
                  </thead>
                  @endif
                  @endforeach
                  <tbody>
                    @foreach ($semestre2 as $semestre)
                    @if($semestre->Module->unite=="UED")
                         <tr>
                           <th>{{$semestre->Module->titre}}</th>
                              <th>{{$semestre->Module->vsh."h"}}</th>
                              <th><?php if($semestre->Module->C==60)
                                echo '1h';
                              elseif ($semestre->Module->C==90) {
                                echo '1h30';
                              }elseif ($semestre->Module->C==120) {
                                echo '2h';
                              }elseif ($semestre->Module->C==150){
                                echo '2h30';
                              }elseif ($semestre->Module->C==180) {
                                echo '3h';
                              }elseif ($semestre->Module->C==0)

                              echo $semestre->Module->C."h" ; ?>
                              </th>
                          <th><?php if($semestre->Module->TD==60)
                            echo '1h';
                          elseif ($semestre->Module->TD==90) {
                            echo '1h30';
                          }elseif ($semestre->Module->TD==120) {
                            echo '2h';
                          }elseif ($semestre->Module->TD==150){
                            echo '2h30';
                          }elseif ($semestre->Module->TD==180) {
                            echo '3h';
                          }elseif ($semestre->Module->TD==0)

                          echo $semestre->Module->TD."h" ;
                          ?>
                          <th><?php if($semestre->Module->TP==60)
                            echo '1h';
                          elseif ($semestre->Module->TP==90) {
                            echo '1h30';
                          }elseif ($semestre->Module->TP==120) {
                            echo '2h';
                          }elseif ($semestre->Module->TP==150){
                            echo '2h30';
                          }elseif ($semestre->Module->TP==180) {
                            echo '3h';
                          }elseif ($semestre->Module->TP==0)

                          echo $semestre->Module->TP."h" ;
                          ?><th>{{$semestre->Module->coeff}}</th>
                              <th>{{$semestre->Module->credit}}</th>
                              <th style="color: blue">
                                @foreach ($semestre->Module->elementcompetences as $elementCompetence )
                                 {{$elementCompetence->intitule}}

                                  @endforeach</th>

                          </tr>
                          @endif
                         @endforeach
                       </tbody>
                </table>
<!-- :::::::::::::::::::::::::::::::::::: :::::::::::::::::::::Semstre3:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->
<hr>

<h5 ><strong>Semestre 3 :</strong> </h5>
<br>
<table class="table table-bordered">
  <thead class="sm">
    <tr>
      <th >Unité D'Enseignement</th>
      <th >VHS</th>
       <th colspan="3" class="text-center">  VH hebdomadaire</th>
      <th >Coeff</th>
      <th >Crédit</th>

      <tr>
         <th></th>
         <th></th>
         <th >C</th>
         <th >TD</th>
         <th>TP</th>
         <th></th>
      </tr>
  </thead>
    <!-- ----------------------------------::::::::::::::::------------------------------------------------ -->

  <thead>
    <tr>
        <th style="background-color: rgb(241, 236, 225)" colspan="8"> {{ "UE Fondamentales"}}   </th>
   </tr>
  </thead>

  <tbody>
    @foreach ($semestre3 as $semestre)
         <tr>
            @if($semestre->Module->unite=="UEF")

              <th>{{$semestre->Module->titre}}</th>
              <th>{{$semestre->Module->vsh."h"}}</th>
              <th><?php if($semestre->Module->C==0) echo $semestre->Module->C; else  echo $semestre->Module->C."h" ; ?></th>
              <th><?php if($semestre->Module->TD==0) echo $semestre->Module->TD; else  echo $semestre->Module->TD."h" ; ?></th>
              <th><?php if($semestre->Module->TP==0) echo $semestre->Module->TP; else  echo $semestre->Module->TP."h" ; ?></th>
              <th>{{$semestre->Module->coeff}}</th>
              <th>{{$semestre->Module->credit}}</th>
              <th style="color: blue">
                @foreach ($semestre->Module->elementcompetences as $elementCompetence )
                 {{$elementCompetence->intitule}}

                  @endforeach</th>
              @endif
          </tr>

         @endforeach
       </tbody>
       <!-- ----------------------------------::::::::::::::::------------------------------------------------ -->
    <thead>
    <tr>
        <th style="background-color: rgb(241, 236, 225)" colspan="8">{{"UE Methodologiue"}}</th>

   </tr>
  </thead>
  <tbody>
  @foreach ($semestre3 as $semestre)
    <tr>
        @if($semestre->Module->unite=="UEM")

         <th>{{$semestre->Module->titre}}</th>
         <th>{{$semestre->Module->vsh."h"}}</th>
         <th><?php if($semestre->Module->C==0) echo $semestre->Module->C; else  echo $semestre->Module->C."h" ; ?></th>
         <th><?php if($semestre->Module->TD==0) echo $semestre->Module->TD; else  echo $semestre->Module->TD."h" ; ?></th>
         <th><?php if($semestre->Module->TP==0) echo $semestre->Module->TP; else  echo $semestre->Module->TP."h" ; ?></th>
         <th>{{$semestre->Module->coeff}}</th>
         <th>{{$semestre->Module->credit}}</th>
         <th style="color: blue">
            @foreach ($semestre->Module->elementcompetences as $elementCompetence )
             {{$elementCompetence->intitule}}

              @endforeach</th>
         @endif
     </tr>

    @endforeach
  </tbody>
    <!-- ----------------------------------::::::::::::::::------------------------------------------------ -->

  @foreach ($semestre3 as $semestre )
  @if($semestre->Module->unite=="UED")

  <thead>
    <tr>
        <th style="background-color: rgb(241, 236, 225)" colspan="8">
            {{ "UE Découverte"}}
        </th>

   </tr>
  </thead>
  @endif
  @endforeach
  <tbody>
    @foreach ($semestre3 as $semestre)
    @if($semestre->Module->unite=="UED")
         <tr>
           <th>{{$semestre->Module->titre}}</th>
              <th>{{$semestre->Module->vsh."h"}}</th>
              <th><?php if($semestre->Module->C==0) echo $semestre->Module->C; else  echo $semestre->Module->C."h" ; ?></th>
              <th><?php if($semestre->Module->TD==0) echo $semestre->Module->TD; else  echo $semestre->Module->TD."h" ; ?></th>
              <th><?php if($semestre->Module->TP==0) echo $semestre->Module->TP; else  echo $semestre->Module->TP."h" ; ?></th>
              <th>{{$semestre->Module->coeff}}</th>
              <th>{{$semestre->Module->credit}}</th>
              <th style="color: blue">
                @foreach ($semestre->Module->elementcompetences as $elementCompetence )
                {{$elementCompetence->intitule}}

                  @endforeach </th>


          </tr>
          @endif
         @endforeach
       </tbody>
</table>
<!-- Semestre 4       -->
<hr>

<h5 ><strong>Semestre 4 :</strong> </h5>
<p>

    <p>
<br>
<p>
    <h5  style="color: rgb(90, 89, 88)"> Chef De Specialité : </h5> <strong><?php  foreach ($specialite as $key => $value) {

    }  echo $value->user->nom;
    ?></strong>


    <h5  style="color: rgb(90, 89, 88)"> Date: </h5> <strong><?php  foreach ($specialite as $key => $value) {

    }
       echo $value->created_at->format('d/m/y');

    ?></strong>

</p>
</div>

 </div>
 <br>

 </div>
</div>
</body>
</html>
