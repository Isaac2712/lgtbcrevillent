@extends('layout_administrador')
@section('formularios')
<?php 
  //Hay que modificar este parametro para que la hora sea la correcta
  date_default_timezone_set('Europe/Berlin'); 
?>
<form enctype="multipart/form-data" action="#" id="upload_form" name="form-añadir-eventos" method="POST">
    <h3 class="titulo-formulario p-3"> Insertar eventos</h3>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <input type="text" class="form-control" id="titulo_evento" name="titulo_evento" placeholder="Titulo del evento" value="" required>
    </div>

    <div class="form-group">
      <input type="text" class="form-control" id="localidad_evento" name="localidad_evento" placeholder="Localidad. Ej. Crevillente" value="" required>
    </div>

    <div class="form-group">
      <textarea class="form-control" rows="5" name="texto_evento" id="texto_evento" placeholder="Texto del evento" required></textarea>
    </div>

    <div class="form-group">
      <input type="text" class="form-control" id="lugar_evento" name="lugar_evento" placeholder="Lugar del evento. Ej. Casa de cultura" value="" required>
    </div>

    <div class="form-group">
      <input type="text" class="form-control" id="direccion_evento" name="direccion_evento" placeholder="Direccion del evento. Ej. C/ Blasco Ibañez nº2" value="" required>
    </div>

    <div class="form-group">
      <input type="tel" class="form-control" id="telefono_evento" name="telefono_evento" placeholder="Telefono. Ej. 617423859" value="" required>
    </div>

    <div class="form-group">
      <input type="text" class="form-control" id="horario_evento" name="horario_evento" placeholder="Horario. Ej. 16:00 a 20:00" value="" required>
    </div>

    <div class="form-group">
      <input type="date" class="form-control" id="fecha_evento" name="fecha_evento" placeholder="Fecha" value="">
    </div>

    <div class="form-group">
      <section class="input-group">
      <select class="custom-select" id="select_tipo_evento" name="select_tipo_evento">
        <option value='' selected>Selecciona el tipo de evento</option>
        <option value='actividades'>Actividades</option>
        <option value='mesaredonda'>Mesa redonda</option>
        <option value='aniversario'>Aniversario</option>
        <option value='concentracion'>Concentración</option>
        <option value='otros'>Otros</option>
      </select>
    </div>

    <div id="imagen_evento">
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="imagen_evento" name="imagen_evento" required>
        <label class="custom-file-label" for="imagen_evento">Selecciona la imagen</label>
      </div>
    </div>
    <div class="" id="resultado_anadir_evento"></div>
    <div class="mt-3 w-100">
      <button onclick="return btnAnadirEvento()" type="submit" class="btn btn-primary float-right mb-3" name="enviarEven"> Guardar evento</button>
    </div>
</form>
@stop