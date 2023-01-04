@include('home.head')
<main id="mainbar" class="mainbar">
  <section class="breadcrumbaffiche">
      <div class="hero-container">
          <h1> {{$metier->titre}}</h1>
      </div>
  </section>
  <div class="aff">
    <br>
    <br>
    <div class="section-title-affiche" >
        <h2>Description </h2>

        <p>{{$metier->description}} </p>
    </div>

    <?php $i=0; ?>
    @foreach ($metier->missions as $mission)
    <hr>
    <br>
    <?php $i++; ?>
    <div class="section-title-affiche" >
    
    
       <h2>Mission<?php echo $i;?></h2>
    
       <p>{{$mission->description}}</p>
  </div>
  <?php $j=0; ?>
  @foreach ($mission->competences as $competence) 
  <?php $j++; ?>
  <div class="section-title-affiche" >
    <br>
    <h2>Competence <?php echo $j;?></h2>
 
    <p> {{$competence->intitule}}</p>
  </div>
    <div class="accordion-container">
      <div class="accordion">
      <div class="accordion-heading">
      
         <h3>Element de compétence</h3>
         <i class="bi bi-chevron-down "></i>
      </div>
      <div class="accordion-content">
        @foreach ($competence->elementcompetences as $elem)
    <p >
        <span class="p"><i class="bi bi-circle-fill"></i>{{$elem->intitule}}</span>
    </p>



    @endforeach
   
  </div>
 
    



   









    
</div>
  @endforeach
  @endforeach
</div>







<script>
  let accordions=document.querySelectorAll('.accordion-container .accordion');
  accordions.forEach(acco=>{
      acco.onclick=()=>{
      accordions.forEach(subAcco=>{subAcco.classList.remove('active') });
      acco.classList.add('active');
      }
  } )
</script>