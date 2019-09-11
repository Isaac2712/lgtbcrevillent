@extends('layout_administrador')
@section('formularios')

<form enctype="multipart/form-data" action="#" id="formulario_usuarios" name="form-añadir-noticias" method="POST">
	<h3 class="titulo-formulario p-3"> Usuario {{ $usuario->nombre_completo }} </h3>
	<input type="hidden" name="id_usuario" value="{{ $usuario->id }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
 	<div class="input-group mb-3">
 		<input type="text" class="form-control" id="nick" name="nick" disabled value="{{ $usuario->nick }}" aria-label="nick" aria-describedby="nick">
 		<div class="input-group-prepend">
		    <span class="input-group-text font-weight-bold" id="nick">Nick del usuario</span>
		</div>
    </div>

    <div class="input-group mb-3">
      	<input type="text" class="form-control" id="nombre" name="nombre" disabled value="{{ $usuario->nombre_completo }}" aria-label="nombre" aria-describedby="nombre">
 		<div class="input-group-prepend">
		    <span class="input-group-text font-weight-bold" id="nombre">Nombre del usuario</span>
		</div>
    </div>

    <div class="input-group mb-3">
      	<input type="text" class="form-control" id="email" name="email" disabled value="{{ $usuario->email }}" aria-label="email" aria-describedby="email">
 		<div class="input-group-prepend">
		    <span class="input-group-text font-weight-bold" id="email">Email del usuario</span>
		</div>
    </div>

    <div class="input-group mb-3">
      	<input type="text" class="form-control" id="provincia" name="provincia" disabled value="<?= $provincia[0]['provincia']?>" aria-label="provincia" aria-describedby="provincia">
 		<div class="input-group-prepend">
		    <span class="input-group-text font-weight-bold" id="provincia">Provincia del usuario</span>
		</div>
    </div>

    <div class="input-group mb-3">
      	<input type="text" class="form-control" id="municipio" name="municipio" disabled value="<?= $municipio[0]['municipio']?>" aria-label="municipio" aria-describedby="municipio">
 		<div class="input-group-prepend">
		    <span class="input-group-text font-weight-bold" id="municipio">Municipio del usuario</span>
		</div>
    </div>

    <div class="input-group mb-3">
      	<input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" disabled value="{{ $usuario->fecha_nacimiento }}" aria-label="fecha_nacimiento" aria-describedby="fecha_nacimiento">
 		<div class="input-group-prepend">
		    <span class="input-group-text font-weight-bold" id="fecha_nacimiento">Fecha de nacimiento del usuario</span>
		</div>
    </div>

    <div class="input-group mb-3">
      	<input type="text" class="form-control" id="sexo" name="sexo" disabled value="{{ $usuario->sexo }}" aria-label="sexo" aria-describedby="sexo">
 		<div class="input-group-prepend">
		    <span class="input-group-text font-weight-bold" id="sexo">Sexo del usuario</span>
		</div>
    </div>

    <div class="input-group mb-3">
      	<select class="custom-select select_user" id="select_user" name="seleccionar_tipo_usuario">
		    <option value="Admin">Administrador</option>
		    <option value="Estandar">Estandar</option>
		</select>
		<input id="input_tipo_usuario" type="text" class="form-control" id="tipo" name="tipo" disabled value="Tipo de usuario: '{{ $usuario->tipo }}'" aria-label="tipo" aria-describedby="tipo">
 		<div class="input-group-prepend">
		    <button id="boton_user" type="button" onclick="return btnModificarTipoUsuario()" class="btn btn-primary"> Modificar tipo de usuario</a>
		</div>
    </div>
</form>
@stop