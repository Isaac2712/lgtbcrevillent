@extends('layout')
@section('contenido')
<section class="container mt-5 mb-5">
<section id="app" class="col-md-7 col-lg-5 m-auto">
	<span id="span_cambiar_contrasena"> Cambio de contraseña para el correo <span class="font-weight-bold"> <?= $email[0]['email']; ?></span> </span>
	<form id="formulario_nueva_contraseña" action="#" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id_usuario" value="<?= $email[0]['id']; ?>">
        <div class="input-group mt-2 mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text font-weight-bold" id="contraseña">nueva contraseña</span>
            </div>
            <input type="password" class="form-control" id="contraseña_1" name="contraseña" value="" aria-label="contraseña" aria-describedby="contraseña">  
        </div>
        <aside id="div_contraseña"></aside>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text font-weight-bold" id="contraseña2">repetir contraseña2</span>
            </div>
            <input type="password" class="form-control" id="contraseña_2" name="contraseña2" value="" aria-label="contraseña2" aria-describedby="contraseña2">
        </div>
        <aside id="div_contraseña2"></aside>
        <aside id="contraseñas_distintas"></aside>
        <button type="button" onclick="return btnCambiarContraseña()" class="btn btn-primary btn-sm"> guardar nueva contraseña </button>
    </form>
    <aside id="resultado_cambiar_contraseña"></aside>
</section>
</section>
@stop