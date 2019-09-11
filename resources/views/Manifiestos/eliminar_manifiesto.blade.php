@extends('layout_administrador')
@section('formularios')
<?php
	$nombrearchivo = ""; 
	$titulo = ""; 
	$localidad = ""; 
	$texto = ""; 
	$lugar = ""; 
	$direccion = "";  
	$telefono = ""; 
	$horario = "";  
	$fecha = ""; 
?>

<form action="" method="POST">
  <h3 class="titulo-formulario p-3"> Eliminar manifiestos </h3>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <!-- Seccion select -->
  <section class="input-group w-50 m-auto pt-2">
    <select class="custom-select" id="select_eliminar_manifiesto" name="select_eliminar_manifiesto">
      <option value='' selected>Selecciona alguno...</option>
      <?php
          for($i=0; $i < count($manifiestos); $i++){
            $id_manifiesto = $manifiestos[$i]['id'];
            $titulo_manifiesto = $manifiestos[$i]['titulo'];
            echo "<option id='manifiesto' value='{$id_manifiesto}'>".substr($titulo_manifiesto, 0, 30)."</option>";
          }
          
       ?>
    </select>

    <!-- Seccion boton -->
    <section class="input-group-append">
      <button class="btn btn-outline-danger" onclick="return btnEliminarManifiesto()" type="button">Eliminar</button>
    </section>
    <!-- /FIN seccion boton -->

    <span class="w-100" id="boton_eliminar"></span>

    <!-- Seccion definitivo eliminar -->
    <section class="w-100 mt-4 definitivo_eliminar" id="definitivo_eliminar">
      <div class='alert alert-warning' role='alert'>
        <h4 class='alert-heading'>Cuidado!</h4>
        <p>¿Seguro quieres eliminar el manifiesto seleccionado?</p>
        <p id="manifiesto_seleccionado"></p>
        <form>
          <button type="button" name='si_elimanos_manifiesto' onclick="return btnSiEliminamosManifiesto()" class='btn btn-outline-primary'>Si</button>
          <button type="button" name='no_eliminamos_manifiesto' onclick="return btnNoEliminamosManifiesto()" class='btn btn-outline-secondary'>No</button>
        </form>
      </div>
    </section>
    <!-- /FIN seccion definitivo eliminar-->
    <!-- RESULTADO FINAL -->
    <span class="w-100" id="resultado_eliminar_manifiesto"></span>
  </section> <!-- /FIN seccion select -->
</form>
@stop