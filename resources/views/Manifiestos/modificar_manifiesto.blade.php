@extends('layout_administrador')
@section('formularios')
<div class="" id="resultado_seleccionar_manifiesto"></div>
<div class="" id="prueba"></div>
<form enctype=”multipart/form-data” action="#" id="form_modificar_manifiesto" name="form_modificar_manifiesto" method="POST">
    <h3 class="titulo-formulario p-3"> Modificar manifiestos</h3>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id_manifiesto" value="{{ $manifiesto->id }}">
    <div class="form-group">
      <input type="text" class="form-control" id="titulo_manifiesto" name="titulo_manifiesto" placeholder="Titulo del manifiesto" value="{{ $manifiesto->titulo }}" required disabled>
    </div>
<!--
    <div class="form-group">
      <textarea class="form-control" rows="5" name="texto_manifiesto" id="texto_manifiesto" placeholder="Texto del manifiesto" required>{{ $manifiesto->texto }}</textarea>
    </div>
-->
    <div class="form-group">
      <input type="datetime" class="form-control" id="fecha_manifiesto" name="fecha_manifiesto" placeholder="Fecha" value="<?= date('Y/m/d H:i'); ?>" disabled>
    </div>

    <div id="pdf_manifiesto">
      <div class="custom-file">
        <input type="file" accept="application/pdf" class="custom-file-input" id="pdf_manifiesto" name="pdf_manifiesto" required>
        <label class="custom-file-label" for="pdf_manifiesto">PDF</label>
      </div>
    </div>
    <div class="" id="resultado_modificar_manifiesto"></div>
    <div class="mt-3 w-100">
      <button type="button" onclick="return btnModificarManifiesto()" class="btn btn-primary float-right mb-3"> Modificar manifiesto</button>
    </div>
</form>
@stop