@extends('layout')
@section('contenido')
<section class="container mt-5 mb-5">
    <h3> Recupera tu cuenta </h3>
<?php
    if(isset($mensaje))
    {
?>
    <div id="buscar_email_error" class="p-2 col-md-7 col-lg-5 m-auto"> <a href="/registrarse"> {{ $mensaje }} </a> </div>
<?php
    }
    else
    {
        $mensaje = "";
    }
?>
    <section id="app" class="col-md-7 col-lg-5 m-auto pt-3">
        <span id="span_cambiar_contrasena" class="pb-3">Introduce tu correo electronico para poder recuperar tu cuenta</span>
        <section id="seccion_cambiar_contrasena">
            <form action="{{ url('/acceder/buscar_email') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold" id="email">Email del usuario</span>
                    </div>
                    <input type="text" class="form-control" id="email" name="email" value="" aria-label="email" aria-describedby="email">  
                </div>
                <button type="submit" class="btn btn-primary btn-sm"> Buscar </button>
                <a href="{{ route('home') }}" role="button" class="btn btn-secondary btn-sm"> Cancelar </a>
            </form>
        </section>
    </section>
</section>
@stop