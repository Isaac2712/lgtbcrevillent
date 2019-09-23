<!DOCTYPE html>
<html lang="en">
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
<?php
	if(isset($_SESSION['nick_usuario'])){
      $nick_usuario = $_SESSION['nick_usuario'];
    } else {
    	$nick_usuario = "";
    }
    
    if(isset($_SESSION['tipo_usuario'])){
      $tipo_usuario = $_SESSION['tipo_usuario'];
    }else{
    	$tipo_usuario = "";
    }

    function activeMenu($url){
        return request()->is($url) ? 'link-menu-principal' : '';
    }
?>
<body id="contenedor"> 
<section id="app">
<header> <!-- sticky-top hace que el header vaya hacia abajo -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
      <a class="navbar-brand" href="{{ route('home') }}">
          <img class='imagen-index' src="/imagenes/LOGO.jpg" width="100px" height="50px" title="Inicio"/>
          <span class="title-nav ml-3"> LGTB Crevillent </span>
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
      </button>

      <section class="collapse navbar-collapse d-flex-lg justify-content-lg-end" id="navbarTogglerDemo01">
        <ul class="navbar-nav">
          <li class="nav-item li-menu-principal">
            <a class="nav-link pl-2 {{ activeMenu('/') }}" href="{{ route('home') }}">INICIO</a>
          </li>
          <li class="nav-item li-menu-principal">
            <a class="nav-link pl-2  {{ activeMenu('manifiestos') }}" href="{{ route('manifiestos') }}">MANIFIESTOS</a>
          </li>
          <li class="nav-item li-menu-principal">
            <a class="nav-link pl-2 {{ activeMenu('quienesSomos') }}" href="{{ route('quienes_somos') }}">QUIENES SOMOS</a>
          </li> 
          <li class="nav-item li-menu-principal">
            <a class="nav-link pl-2 {{ activeMenu('contacto') }}" href="{{ route('contacto') }}">CONTACTO</a>
          </li>
          <?php if(!isset($_SESSION['nick_usuario'])){ ?> <!-- Si no hay session -->
                <li class="nav-item">
                    <a class="btn btn-dark bg-primary" role="button" href="{{ route('acceder') }}">ACCEDER</a>
                </li>
          <?php } if(($tipo_usuario) && $tipo_usuario == 'Admin'){ ?> 
          <!-- Si la session es de tipo usuario -->
                <li class="nav-item li-menu-principal">
                    <a class="nav-link pl-2 {{ activeMenu('administrador') }}" href="{{ route('administrador') }}">ADMINISTRADOR</a>
                </li>
          <?php } if(isset($_SESSION['nick_usuario']) && ($tipo_usuario) && $tipo_usuario == 'Estandar'){ ?>  <!-- Si hay session de un usuario estandar, añadimos opcion mi perfil -->
                <li class="nav-item li-menu-principal">
                    <a class="nav-link pl-2 mr-2 {{ activeMenu('mi_perfil') }}" href="{{ url('/mi_perfil/'.$_SESSION['nick_usuario']) }}">MI PERFIL</a>
                </li>
          <?php } if(isset($_SESSION['nick_usuario'])){ ?> <!-- Si hay session -->
                <form method='POST' action='{{ route('desconectar') }}' >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class='btn btn-danger' name='desconectar' type="submit"> DESCONECTAR </button>
                </form> 
          <?php } ?>
        </ul>
      </section> 
    </nav>
</header>

<main>
 @yield('contenido')
</main>

<footer class="page-footer font-small unique-color-dark">
  <header id="header-footer">
    <section class="container">
      <article class="row py-4 d-flex align-items-center">
        <aside class="col-md-7 col-lg-6 text-center text-md-left mb-4 mb-md-0">
          <h6 class="mb-0 font-weight-bold"> ¡Accede a nuestras redes sociales para saber más de nosotros!</h6>
        </aside>
        <aside class="col-md-5 col-lg-6 text-center text-md-right">
          <!-- Facebook -->
          <a id="icono-redes-sociales-footer" onmouseover="RedesSocialesFooterHover()" onmouseout="RedesSocialesFooterSinHover()"  class="p-2" href="https://es-es.facebook.com/LGTBCREVILLENT/" class="fb-ic">
            <i class="fab fa-facebook-f white-text mr-4"> </i>
          </a>
          <!-- Twitter -->
          <a id="icono-redes-sociales-footer" onmouseover="RedesSocialesFooterHover()" onmouseout="RedesSocialesFooterSinHover()" class="p-2" href="https://twitter.com/crevillentlgtb?lang=es">
            <i class="fab fa-twitter white-text mr-4"> </i>
          </a>
          <!-- Google +-->
          <a id="icono-redes-sociales-footer" onmouseover="RedesSocialesFooterHover()" onmouseout="RedesSocialesFooterSinHover()" class="p-2" href="https://plus.google.com/107742714242312412984">
            <i class="fab fa-google-plus-g white-text mr-4"> </i>
          </a>
          <!--Instagram-->
          <a id="icono-redes-sociales-footer" onmouseover="RedesSocialesFooterHover()" onmouseout="RedesSocialesFooterSinHover()" class="p-2" href="">
            <i class="fab fa-instagram white-text mr-4"> </i>
          </a>
          <!--Youtube-->
          <a id="icono-redes-sociales-footer" onmouseover="RedesSocialesFooterHover()" onmouseout="RedesSocialesFooterSinHover()" class="p-2" href="https://www.youtube.com/channel/UCl2qNdR0cVu9WxVO2yWkJAw">
            <i class="fab fa-youtube white-text"> </i>
          </a>
        </aside>
      </article>
    </section>
  </header>

  <section class="container text-center text-md-left mt-5">
    <section class="row mt-3">
      <section class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
        <h6 class="text-uppercase font-weight-bold">Asociación</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>LGTBCREVILLENT</p>
        <p>Administrador de la web Isaac Marroquí</p>
        <p> Tlf. 658925126 </p>
      </section>

      <section class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
        <h6 class="text-uppercase font-weight-bold">Terminos legales</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p><a href="{{ route('aviso_legal') }}">Aviso Legal</a></p>
        <p><a href="{{ route('politica_cookies') }}">Politica de Cookies</a></p>
        <p><a href="{{ route('politica_privacidad') }}">Politica de privacidad</a></p>
      </section>

      <section class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
        <h6 class="text-uppercase font-weight-bold">links</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p><a href="{{ route('home') }}">Inicio</a></p>
        <p><a href="{{ route('manifiestos') }}">Manifiestos</a></p>
        <p><a href="{{ route('quienes_somos') }}">Quienes somos</a></p>
        <p><a href="{{ route('contacto') }}">Contacto</a></p>
        </p>
      </section>

      <section class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
        <h6 class="text-uppercase font-weight-bold">Contacto</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p><i class="fas fa-home mr-3"></i><a href="{{ route('contacto') }}">Plaça Dr. Mas Candela, 15, 03330 Crevillent, Alacant</a></p>
        <p><i class="fas fa-envelope mr-3"></i><a href='mailto:lgtbcrevillent@hotmail.com'>lgtbcrevillent@hotmail.com</a></p>
        <p><i class="fas fa-phone mr-3"></i> +34 687 63 20 97</p>
        <p><i class="fas fa-phone mr-3"></i> +34 658 92 51 26</p>
      </section>
    </section>
  </section>

  <aside class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="{{ route('home') }}"> lgtbcrevillent.com </a>
  </aside>
</footer>
<!-- SECCION PARA COOKIES -->
  <section class="alert alert-dismissible text-center" id="section_cookies">
    <aside id="info_cookies">
      <span id="span_cookies">Esta web utiliza cookies para obtener datos estadísticos de la navegación de sus usuarios. Si continúas navegando consideramos que aceptas su uso.
        <a href="{{ route('politica_privacidad') }}">Más información</a>
        <button class="btn btn-light text-white" onclick="aceptar_cookies();" style="cursor:pointer;">Cerrar</button>
      </span>
    </aside>
  </section>
<!-- /FIN SECCION PARA COOKIES -->
</section> <!-- SECCION APP -->
<!-- SCRIPT PAR APP -->
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<!-- SCRIPT PARA HOVER SOBRE REDES SOCIALES FOOTER -->
<script type="text/javascript" src="{{ asset('js/RedesSocialesFooter.js')}}"></script>
<!-- CAMBIAR CONTRASEÑA OLVIDADA -->
<script type="text/javascript" src="{{ asset('js/Usuarios/btnCambiarContraseña.js') }}"></script>
<!-- SCRIPT PARA COOKIES -->
<script type="text/javascript" src="{{ asset('js/cookies.js') }}"></script>
<!-- SCRIPT PAR MOSTRAR Y OCULTAR CONTRASEÑA CAMPO PASSWORD -->
<script type="text/javascript" src="{{ asset('js/Usuarios/modificarInputPerfilUsuario.js') }}"></script>
<!-- MOSTRAR PROVINCIAS -->
<script type="text/javascript" src="{{ asset('js/Provincias.js') }}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139937579-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-139937579-1');
</script>
</body>
</html>
