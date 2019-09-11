@extends('layout_administrador')
@section('formularios')
<?php 
  //Hay que modificar este parametro para que la hora sea la correcta
  date_default_timezone_set('Europe/Berlin'); 
?>
<form enctype="multipart/form-data" action="#" id="upload_form" name="form-añadir-manifiestos" method="POST">
    <h3 class="titulo-formulario p-3"> Insertar manifiestos </h3>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <input type="text" class="form-control" id="titulo_manifiesto" name="titulo_manifiesto" placeholder="Titulo del manifiesto" value="" required>
    </div>

<!--
    <div class="form-group">
      <textarea class="form-control" rows="5" name="texto_manifiesto" id="texto_manifiesto" placeholder="Texto del manifiesto" required></textarea>
    </div>
-->

    <div class="form-group">
      <input type="datetime" class="form-control" id="fecha_manifiesto" name="fecha_manifiesto" placeholder="Fecha" value="<?= date('Y/m/d H:i'); ?>" disabled>
    </div>

   <div id="pdf_manifiesto">
      <div class="custom-file">
        <input accept="application/pdf" type="file" class="custom-file-input" id="pdf_manifiesto" name="pdf_manifiesto" required>
        <label class="custom-file-label" for="pdf_manifiesto">PDF</label>
      </div>
    </div>

<!--
    <div id="imagen_manifiesto">
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="imagen_manifiesto" name="imagen_manifiesto" required>
        <label class="custom-file-label" for="imagen_manifiesto">Selecciona la imagen</label>
      </div>
    </div>
-->

    <div class="" id="resultado_anadir_manifiesto"></div>
    <div class="mt-3 w-100">
      <button onclick="return btnAnadirManifiesto()" type="submit" class="btn btn-primary float-right mb-3" name="enviarEven"> Guardar manifiesto</button>
    </div>
</form>
@stop