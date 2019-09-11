@extends('layout_administrador')
@section('formularios')
<div class="" id="resultado_seleccionar_noticia"></div>
<div class="" id="prueba"></div>
<form enctype=”multipart/form-data” action="#" id="form_modificar_noticia" name="form_modificar_noticia" method="POST">
    <h3 class="titulo-formulario p-3"> Modificar noticias</h3>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id_noticia" value="{{ $noticia->id }}">
    <div class="form-group">
      <input type="text" class="form-control" id="titulo_noticia" name="titulo_noticia" placeholder="Titulo del noticia" value="{{ $noticia->titulo }}" required disabled>
    </div>

    <div class="form-group">
      <input type="text" class="form-control" id="enlace_noticia" name="enlace_noticia" placeholder="Localidad. Ej. Crevillente" value="{{ $noticia->enlace }}" required>
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
    <div class="" id="resultado_modificar_noticia"></div>
    <div class="mt-3 w-100">
      <button type="button" onclick="return btnModificarNoticia()" class="btn btn-primary float-right mb-3"> Modificar noticia</button>
    </div>
</form>
@stop