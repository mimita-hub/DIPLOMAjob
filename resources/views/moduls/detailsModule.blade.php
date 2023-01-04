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
              <div class="card-body">

  <h5 class="card-title">  Liste Des Modules</h5>







<table class="table table-bordered">
    <thead class="sm">
      <tr>
        <th >Unité D'Enseignement</th>
        <th >VHS</th>
         <th colspan="3" class="text-center">  VH hebdomadaire</th>
        <th >Coeff</th>
        <th >Crédit</th>
        <th colspan="12"  >Element De competenc
            e</th>

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
      @foreach ($data as $mod)
           <tr>
              @if($mod->unite=="UEF")

                <th>{{$mod->titre}}</th>
                <th>{{$mod->vsh."h"}}</th>
                <th><?php if($mod->C==60)
                    echo '1h';
                  elseif ($mod->C==90) {
                    echo '1h30';
                  }elseif ($mod->C==120) {
                    echo '2h';
                  }elseif ($mod->C==150){
                    echo '2h30';
                  }elseif ($mod->C==180) {
                    echo '3h';
                  }elseif ($mod->C==0)

                  echo $mod->C ; ?>
                  </th>
              <th><?php if($mod->TD==60)
                echo '1h';
              elseif ($mod->TD==90) {
                echo '1h30';
              }elseif ($mod->TD==120) {
                echo '2h';
              }elseif ($mod->TD==150){
                echo '2h30';
              }elseif ($mod->TD==180) {
                echo '3h';
              }elseif ($mod->TD==0)

              echo $mod->TD ;
              ?>
              <th><?php if($mod->TP==60)
                echo '1h';
              elseif ($mod->TP==90) {
                echo '1h30';
              }elseif ($mod->TP==120) {
                echo '2h';
              }elseif ($mod->TP==150){
                echo '2h30';
              }elseif ($mod->TP==180) {
                echo '3h';
              }elseif ($mod->TP==0)

              echo $mod->TP ;
              ?>
<th>{{$mod->coeff}}</th>
                <th>{{$mod->credit}}</th>
                <th colspan="6" >

                  @foreach ( $mod->elementcompetences as $element )
                  {{$element->intitule}}
                <th>
                  @endforeach

              </th>

                @endif
            </tr>

           @endforeach
         </tbody>
         <!-- ----------------------------------::::::::::::::::------------------------------------------------ -->

         <thead>
      <tr>
          <th style="background-color: rgb(241, 236, 225)" colspan="8">{{"UE Methodologique"}}</th>

     </tr>
    </thead>
    <tbody>
      @foreach ($data as $mod)
      <tr>
          @if($mod->unite=="UEM")

           <th>{{$mod->titre}}</th>
           <th>{{$mod->vsh."h"}}</th>
           <th><?php if($mod->C==60)
            echo '1h';
          elseif ($mod->C==90) {
            echo '1h30';
          }elseif ($mod->C==120) {
            echo '2h';
          }elseif ($mod->C==150){
            echo '2h30';
          }elseif ($mod->C==180) {
            echo '3h';
          }elseif ($mod->C==0)

          echo $mod->C."h" ; ?>
          </th>
      <th><?php if($mod->TD==60)
        echo '1h';
      elseif ($mod->TD==90) {
        echo '1h30';
      }elseif ($mod->TD==120) {
        echo '2h';
      }elseif ($mod->TD==150){
        echo '2h30';
      }elseif ($mod->TD==180) {
        echo '3h';
      }elseif ($mod->TD==0)

      echo $mod->TD."h" ;
      ?>
      <th><?php if($mod->TP==60)
        echo '1h';
      elseif ($mod->TP==90) {
        echo '1h30';
      }elseif ($mod->TP==120) {
        echo '2h';
      }elseif ($mod->TP==150){
        echo '2h30';
      }elseif ($mod->TP==180) {
        echo '3h';
      }elseif ($mod->TP==0)

      echo $mod->TP."h" ;
      ?><th>{{$mod->coeff}}</th>
           <th>{{$mod->credit}}</th>
           <th colspan="6" >

              @foreach ( $mod->elementcompetences as $element )
              {{$element->intitule}}
            <th>
              @endforeach

           @endif
       </tr>

      @endforeach
    </tbody>
      <!-- ----------------------------------::::::::::::::::------------------------------------------------ -->


    <thead>
      <tr>
          <th style="background-color: rgb(241, 236, 225)" colspan="8">
              {{ "UE Découverte"}}
          </th>

     </tr>
    </thead>

    <tbody>
      @foreach ($data as $mod)
      @if($mod->unite=="UED")
           <tr>
             <th>{{$mod->titre}}</th>
                <th>{{$mod->vsh."h"}}</th>
                <th><?php if($mod->C==60)
                    echo '1h';
                  elseif ($mod->C==90) {
                    echo '1h30';
                  }elseif ($mod->C==120) {
                    echo '2h';
                  }elseif ($mod->C==150){
                    echo '2h30';
                  }elseif ($mod->C==180) {
                    echo '3h';
                  }elseif ($mod->C==0)

                  echo $mod->C."h" ; ?>
                  </th>
              <th><?php if($mod->TD==60)
                echo '1h';
              elseif ($mod->TD==90) {
                echo '1h30';
              }elseif ($mod->TD==120) {
                echo '2h';
              }elseif ($mod->TD==150){
                echo '2h30';
              }elseif ($mod->TD==180) {
                echo '3h';
              }elseif ($mod->TD==0)

              echo $mod->TD."h" ;
              ?>
              <th><?php if($mod->TP==60)
                echo '1h';
              elseif ($mod->TP==90) {
                echo '1h30';
              }elseif ($mod->TP==120) {
                echo '2h';
              }elseif ($mod->TP==150){
                echo '2h30';
              }elseif ($mod->TP==180) {
                echo '3h';
              }elseif ($mod->TP==0)

              echo $mod->TP."h" ;
              ?> <th>{{$mod->coeff}}</th>
                <th>{{$mod->credit}}</th>
                <th colspan="3" >

                  @foreach ( $mod->elementcompetences as $element )
                  {{$element->intitule}}
                <th>
                  @endforeach


            </tr>
            @endif
           @endforeach
         </tbody>
  </table>
</div>
</section>


</main><!-- End #main -->


@include('adminDash.footerAD')

