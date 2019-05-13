<?php

 $slide = ControladorSlide::ctrMostrarSlide();

?>
<div class="content-wrapper">
  
  <section class="content-header">
    
    <h1>
      Gestor Slide
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor Slide</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary agregarSlide">
          
          Agregar slide

        </button>

      </div>

      <div class="box-body">

        <ul class="todo-list">

        </ul>
<?php 

foreach ($slide as $key => $value) {  
  $estiloTextoSlide = json_decode($value["estiloTextoSlide"], true);
  $titulo1 = json_decode($value["titulo1"], true);
  $titulo2 = json_decode($value["titulo2"], true);
  $titulo3 = json_decode($value["titulo3"], true);
}

?>
</div>

</div>

</section>

</div>