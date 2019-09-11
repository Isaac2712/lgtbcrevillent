<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>LGTBCREVILLENT</title>
        <link rel="icon" href="{{ asset('imagenes/LOGO.jpg') }}" type="image/gif" sizes="16x16">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href="{{ asset('favicon/css/all.css') }}" rel="stylesheet"> <!--load all styles -->
    </head>
    <body class="container bg-dark text-white mt-3">
    <?php if(!isset($_SESSION['nick_usuario'])){ ?>
        <section id="app" class="col-md-7 col-lg-5 m-auto">
            <header class="mb-3">
                <img class="card-img-top" src="/imagenes/LOGO.jpg" title="Inicio"/>
            </header>
            <main>
                <form method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label> Usuario </label>
                        <input type="text" id="nick" name="nick" class="form-control">
                        <div id="div_nick_vacio"></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <div class="input-group">
                            <input id="password" name="password" type="password" class="form-control" value="">
                            <div class="input-group-append" placeholder="Contraseña">
                                <button id="show_password" class="btn btn-primary" type="button" onclick="return mostrarContrasena()"> 
                                    <span class="fa fa-eye-slash icon"></span> 
                                </button>
                            </div>
                        </div>
                        <div id="div_pass_vacio"></div>
                    </div>

                    <button onclick="return btnAcceder()" name="acceder" class="btn btn-primary btn-block"> Acceder </button>
                    <div id="resultado"></div>
                    <button onclick="return btnRegistrarse()" name="registrarse" class="mt-3 btn btn-success btn-block"> Registrarse </button>
                    <aside class="text-center mt-2 mb-2">
                        <a href="{{ route('contraseña_olvidada') }}" class="text-primary"> He olvidado mi contraseña. </a>
                    </aside>
                </form> 
            </main> 
        
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
        </section>
    <?php } ?>
    </body>  
</html>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<!-- BOTON ACCEDER A LA WEB -->
<script type="text/javascript" src="{{ asset('js/btnAcceder.js') }}"></script>
<!-- BOTON REGISTRARSE EN LA WEB -->
<script type="text/javascript" src="{{ asset('js/btnRegistrarse.js') }}"></script>
<!-- SCRIPT PAR MOSTRAR Y OCULTAR CONTRASEÑA CAMPO PASSWORD -->
<script type="text/javascript" src="{{ asset('js/Usuarios/modificarInputPerfilUsuario.js') }}"></script>
