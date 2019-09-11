@extends('layout_administrador')
@section('formularios')
<?php 
  //Hay que modificar este parametro para que la hora sea la correcta
  date_default_timezone_set('Europe/Berlin'); 
?>
<form enctype="multipart/form-data" action="#" id="upload_form" name="form-añadir-noticias" method="POST">
    <h3 class="titulo-formulario p-3"> Insertar noticias </h3>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <input type="text" class="form-control" id="titulo_noticia" name="titulo_noticia" placeholder="Titulo del noticia" required>
    </div>

    <div class="form-group">
      <input type="url" class="form-control" id="enlace_noticia" name="enlace_noticia" placeholder="http://lgtbcrevillent.com" required>
    </div>

    <div class="form-group">
      <input type="datetime" class="form-control" id="fecha_noticia" name="fecha_noticia" placeholder="Fecha" value="<?= date('Y/m/d H:i'); ?>" disabled>
    </div>

    <div id="imagen_noticia">
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="imagen_noticia" name="imagen_noticia" required>
        <label class="custom-file-label" for="imagen_noticia">Selecciona la imagen</label>
      </div>
    </div>
    <div class="" id="resultado_anadir_noticia"></div>
    <div class="mt-3 w-100">
      <button onclick="return btnAnadirNoticia()" type="submit" class="btn btn-primary float-right mb-3" name="enviarEven"> Guardar noticia</button>
    </div>
</form>
@stop