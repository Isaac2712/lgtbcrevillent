<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LGTBCREVILLENT</title>
    <link rel="icon" href="{{ asset('imagenes/LOGO.png') }}" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('favicon/css/all.css') }}" rel="stylesheet"> <!--load all styles -->
</head>
<body class="container bg-dark text-white mt-3">
    <section id="app" class="col-lg-10 m-auto">
        <h1 class="text-center mb-4"> Registrate para lgtbCrevillent </h1>
        <form method="POST" action="" class="row">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group col-md-12 col-lg-6">
                <label class="control-label" for="nick"> Nick del usuario </label>
                <input type="text" value="" class="form-control" id="nick" name="nick" placeholder="lgtb_usuario">
                <aside id="div_nick"></aside>
            </div>
            <div class="form-group col-md-12 col-lg-6">
                <label class="control-label" for="nombre_apellidos"> Nombre y Apellidos </label>
                <input type="text" value="" class="form-control" id="nombre_apellidos" name="nombre_apellidos" placeholder="Nombre y apellidos">
                <aside id="div_nombre_apellidos"></aside>
            </div>
            <div class="form-group col-md-12">
                <label class="control-label" for="email"> Dirección de Correo Electrónico </label>
                <input type="email" value="" class="form-control" id="email" name="email" placeholder="Email">
                <aside id="div_email"></aside>
            </div>
            <div class="form-group col-md-12 col-lg-6">
                <label for="pass">Contraseña</label>
                <div class="input-group">
                    <input id="pass" name="pass" type="password" class="form-control" value="" placeholder="Contraseña">
                    <div class="input-group-append" placeholder="Contraseña">
                        <button id="show_password" class="btn btn-primary" type="button" onclick="return mostrarContrasenaPass()"> 
                            <span class="fa fa-eye-slash icon_1"></span> 
                        </button>
                    </div>
                </div>
                <aside id="div_pass"></aside>
            </div>
            <div class="form-group col-md-12 col-lg-6">
                <label for="pass">Repetir contraseña</label>
                <div class="input-group">
                    <input id="pass2" name="pass2" type="password" class="form-control" value="" placeholder="Repetir contraseña">
                    <div class="input-group-append" placeholder="Contraseña">
                        <button id="show_password" class="btn btn-primary" type="button" onclick="return mostrarContrasenaPass2()"> 
                            <span class="fa fa-eye-slash icon_2"></span> 
                        </button>
                    </div>
                </div>
                <aside id="div_pass2"></aside>
            </div>
            <aside class="col-md-12" id="div_comprobar_pass"></aside>
            <div class="form-group col-md-12 col-lg-6">
                <label class="control-label" for="prov"> Provincia </label>
                <select onchange="return Provincia()" class='form-control' name='provincia' id='selectProvincia'>
                    <option  value="" disabled selected>Selecciona una provincia </option>
                    <?php for($i=0;$i<count($provincias);$i++)
                            { 
                                $idprov = $provincias[$i]['id'];
                                $prov = $provincias[$i]['provincia'];
                    ?>
                                <option value='<?= $idprov ?>'><?= $prov ?></option>
                    <?php   } ?>
                </select>
                <aside id="div_provincia"></aside>
            </div>
            <div class="form-group col-md-12 col-lg-6">
                <label class="control-label" for="municipio"> Municipio </label> <br>
                <select class='form-control' id="municipios" name="municipios">
                    <option value="" disabled selected> Selecciona un municipio </option>
                </select>
                <aside id="div_municipio"></aside>
            </div>
            <div class="form-group col-md-12 col-lg-12">
                <label class="control-label" for="fechaNaci"> Fecha de nacimiento </label> <br>
                <input type="date" id="fechaNaci" value="" class="form-control" name="fechaNaci">
                <aside id="div_fechaNaci"></aside>
            </div>   
            <div class="checkbox">
                <div class="col-md-12 mt-2 mb-1">
                    <input type="checkbox" name="politica" id="politica" autocomplete checked required />
                    <span class="text-justify"> Sí, acepto la <a href="{{ route('politica_privacidad') }}"> política de privacidad </a> de lgtbCrevillent </span>
                    <aside id="div_politica"></aside>
                </div>
            </div>
            <aside class="col-md-12" id="resultado"></aside>
            <button onclick="return Registrarse()" type="submit" name="registrarse" class="btn btn-primary btn-block"> Registrarse </button>
        </form>
    </section>
    <footer style="margin-top:100px;">
        <nav class="navbar navbar-expand-sm fixed-bottom navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('home') }}">LGTBCREVILLENT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-flex-lg justify-content-sm-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item active" aria-current="page">
                    <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manifiestos') }}">Manifiestos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Quienes somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacto') }}">Contacto</a>
                    </li>
                </ul>
            </div> 
        </nav>
    </footer>
</body>
</html>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<!-- MOSTRAR PROVINCIAS -->
<script type="text/javascript" src="{{ asset('js/Provincias.js') }}"></script>
<!-- VALIDACION DE REGISTRO -->
<script type="text/javascript" src="{{ asset('js/Registrarse.js') }}"></script>
<!-- SCRIPT PAR MOSTRAR Y OCULTAR CONTRASEÑA CAMPO PASSWORD -->
<script type="text/javascript" src="{{ asset('js/Usuarios/modificarInputPerfilUsuario.js') }}"></script>