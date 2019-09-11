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
<body>
	<section id="app" class="d-lg-flex">
		<?php 
			if(isset($_SESSION['tipo_usuario'])){
		      	$tipo_usuario = $_SESSION['tipo_usuario'];
		    }else{
		    	$tipo_usuario = "";
		    }

			if(($tipo_usuario) && $tipo_usuario == 'Admin'){ 
		?>
		<section id="menu-pag-admin">
		<nav class="navbar navbar-dark bg-dark font-weight-bold">
		    <button id="boton-menu-pag-admin" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menucompleto" aria-controls="menucompleto">
		        <span class="navbar-toggler-icon"></span>
		    </button>

		    <section class="navbar-collapse" id="menucompleto">
		        <ul class="navbar-nav">
		        	<!-- EVENTOS -->
			        <li class="nav-item p-2">
			          	<a class="nav-link border-bottom border-light" data-toggle="dropdown" data-toggle="collapse">
			          		<i class="fas fa-calendar-alt pr-3"></i> 
			          		<span class="pr-1"> Eventos </span>
			          		<span class="float-right dropdown-toggle mr-1"></span>
			          	</a>
				        <ul class="dropdown-menu mr-auto">
				          	<li class="nav-item hover-menu-administrador"> <a class="dropdown-item" href="{{ route('añadir_evento') }}"> Añadir evento  </a> </li>
				          	<li class="nav-item hover-menu-administrador"> <a class="dropdown-item" href="{{ route('modificar_evento') }}"> Modificar evento </a> </li>
				          	<li class="nav-item hover-menu-administrador"> <a class="dropdown-item" href="{{ route('eliminar_evento') }}"> Eliminar evento </a> </li>
				        </ul>
			        </li>
		          	<!-- NOTICIAS -->
			        <li class="nav-item p-2">
			          	<a class="nav-link border-bottom border-light" data-toggle="dropdown" data-toggle="collapse"> 
			          		<i class="fas fa-flag pr-3"></i> 
			          		<span class="pr-1"> Noticias </span> 
			          		<span class="float-right dropdown-toggle mr-1"></span>
			          	</a>
				        <ul class="dropdown-menu">
				          	<li class="nav-item hover-menu-administrador"> <a class="dropdown-item" href="{{ route('añadir_noticia') }}"> Añadir noticias </a> </li> 
				          	<li class="nav-item hover-menu-administrador"> <a class="dropdown-item" href="{{ route('modificar_noticia') }}"> Modificar noticias </a> </li> 
				          	<li class="nav-item hover-menu-administrador"> <a class="dropdown-item" href="{{ route('eliminar_noticia') }}"> Eliminar noticias </a> </li> 
				        </ul>
			        </li>
					<!-- MANIFIESTOS -->
		            <li class="nav-item p-2">
			          	<a class="nav-link border-bottom border-light" data-toggle="dropdown" data-toggle="collapse">
			          		<i class="fas fa-box-open pr-3"></i>
			          		<span class="pr-1"> Manifiestos </span> 
			          		<span class="float-right dropdown-toggle mr-1"></span>
			          	</a>
				        <ul class="dropdown-menu">
				          	<li class="nav-item hover-menu-administrador"> <a class="dropdown-item" href="{{ route('añadir_manifiesto') }}"> Añadir manifiestos </a> </li> 
				          	<li class="nav-item hover-menu-administrador"> <a class="dropdown-item" href="{{ route('modificar_manifiesto') }}"> Modificar manifiestos </a> </li> 
				          	<li class="nav-item hover-menu-administrador"> <a class="dropdown-item" href="{{ route('eliminar_manifiesto') }}"> Eliminar manifiestos </a> </li> 
				        </ul>
		            </li>
		            <!-- USUARIOS -->
		            <li class="nav-item p-2">
			          	<a class="nav-link border-bottom border-light" data-toggle="dropdown" data-toggle="collapse">
			          		<i class="fas fa-user pr-3"></i>
			          		<span class="pr-1"> Usuarios </span> 
			          		<span class="float-right dropdown-toggle mr-1"></span>
			          	</a>
				        <ul class="dropdown-menu">
				          	<li class="nav-item hover-menu-administrador"> <a class="dropdown-item" href="{{ route('tabla_usuarios') }}"> Ver todos los usuarios </a> </li> 
				        </ul>
		            </li>
		        </ul>
		    </section> 
		</nav>
		<aside class="bg-dark p-3">
			<a class="text-white" href="{{ route('home') }}"> Volver a pagina </a>
			<hr>
			<a class="text-white" href="{{ route('administrador') }}"> Main administrador </a>
		</aside>
		</section>
		<!-- SECCION PARA LOS FORMULARIOS -->
		<section id="formulario-pag-admin" class="mt-2 container-fluid">
			@yield('formularios')
		</section>
		<!-- FIN SECCION PARA LOS FORMULARIOS -->
	</section> <!-- SECCION APP -->
<!-- SCRIPT PAR APP -->
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
<!-- EVENTOS -->
<!-- BOTON AÑADIR EVENTOS -->
<script type="text/javascript" src="{{ asset('js/Eventos/btnAnadirEventos.js') }}"></script>
<!-- BOTON ELIMINAR EVENTOS -->
<script type="text/javascript" src="{{ asset('js/Eventos/btnEliminarEventos.js') }}"></script>
<!-- BOTON MODIFICAR EVENTOS -->
<script type="text/javascript" src="{{ asset('js/Eventos/btnSeleccionarEvento.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/Eventos/btnModificarEvento.js') }}"></script>

<!-- NOTICIAS -->
<!-- BOTON AÑADIR NOTICIAS -->
<script type="text/javascript" src="{{ asset('js/Noticias/btnAnadirNoticias.js') }}"></script>
<!-- BOTON ELIMINAR NOTICIAS -->
<script type="text/javascript" src="{{ asset('js/Noticias/btnEliminarNoticias.js') }}"></script>
<!-- BOTON MODIFICAR NOTICIAS -->
<script type="text/javascript" src="{{ asset('js/Noticias/btnSeleccionarNoticia.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/Noticias/btnModificarNoticias.js') }}"></script>

<!-- MANIFIESTOS -->
<!-- BOTON AÑADIR MANIFIESTOS -->
<script type="text/javascript" src="{{ asset('js/Manifiestos/btnAnadirManifiesto.js') }}"></script>
<!-- BOTON ELIMINAR MANIFIESTOS -->
<script type="text/javascript" src="{{ asset('js/Manifiestos/btnEliminarManifiesto.js') }}"></script>
<!-- BOTON MODIFICAR MANIFIESTOS -->
<script type="text/javascript" src="{{ asset('js/Manifiestos/btnSeleccionarManifiesto.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/Manifiestos/btnModificarManifiesto.js') }}"></script>

<!-- USUARIOS -->
<!-- BOTON MODIFICAR TIPO DE USUARIO -->
<script type="text/javascript" src="{{ asset('js/Usuarios/btnModificarTipoUsuario.js') }}"></script>
<?php }
		else
		{
			header("Location: /error");
			exit;
		}
?>