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
  <h3 class="titulo-formulario p-3"> Eliminar noticias</h3>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <!-- Seccion select -->
  <section class="input-group w-50 m-auto pt-2">
    <select class="custom-select" id="select_eliminar_noticia" name="select_eliminar_noticia">
      <option value='' selected>Selecciona alguno...</option>
      <?php
          for($i=0; $i < count($noticias); $i++){
            $id_noticia = $noticias[$i]['id'];
            $titulo_noticia = $noticias[$i]['titulo'];
            echo "<option id='noticia' value='{$id_noticia}'>$titulo_noticia</option>";
          }
          
       ?>
    </select>

    <!-- Seccion boton -->
    <section class="input-group-append">
      <button class="btn btn-outline-danger" onclick="return btnEliminarNoticia()" type="button">Eliminar</button>
    </section>
    <!-- /FIN seccion boton -->

    <span class="w-100" id="boton_eliminar"></span>

    <!-- Seccion definitivo eliminar -->
    <section class="w-100 mt-4 definitivo_eliminar" id="definitivo_eliminar">
      <div class='alert alert-warning' role='alert'>
        <h4 class='alert-heading'>Cuidado!</h4>
        <p>¿Seguro quieres eliminar la noticia seleccionada?</p>
        <p id="noticia_seleccionado"></p>
        <form>
          <button type="button" name='si_elimanos_noticia' onclick="return btnSiEliminamosNoticia()" class='btn btn-outline-primary'>Si</button>
          <button type="button" name='no_eliminamos_noticia' onclick="return btnNoEliminamosNoticia()" class='btn btn-outline-secondary'>No</button>
        </form>
      </div>
    </section>
    <!-- /FIN seccion definitivo eliminar-->
    <!-- RESULTADO FINAL -->
    <span class="w-100" id="resultado_eliminar_noticia"></span>
  </section> <!-- /FIN seccion select -->
</form>
@stop