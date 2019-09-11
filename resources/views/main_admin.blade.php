@extends('layout_administrador')
@section('formularios')
	<section class="container mt-2">
		<header>
			<h3> Administrador de la página </h3>
			<p> Parte administrativa. Accede a las diferentes secciones: </p>
			<nav>
				<ol class="navbar-nav">
					<li class="nav-item"> <a class="nav-link" href="#eventos">Seccion de eventos</a></li>
					<li class="nav-item"> <a class="nav-link" href="#noticias">Seccion de noticias</a></li>
					<li class="nav-item"> <a class="nav-link" href="#manifiestos">Seccion de manifiestos</a></li>
					<li class="nav-item"> <a class="nav-link" href="#usuarios">Seccion de usuarios</a></li>
				</ol>
			</nav>
		</header>
		<hr>
		<main>
			<article id="eventos"> 
				<h5> Seccion de eventos </h5>
				<p> En esta sección se puede añadir, modificar o eliminar eventos. </p>
				<p> Por ejemplo: Si queremso añadir un evento, siempre que ese titulo no este ya guardado, podremos añadir el nuevo evento. </p>
			</article>
			<article id="noticias"> 
				<h5> Seccion de noticias </h5>
				<p> En esta sección se puede añadir, modificar o eliminar noticias. </p>
				<p> Por ejemplo: Si queremso añadir una noticia, siempre que ese titulo no este ya guardado, podremos añadir la nueva noticia. </p>
			</article>
			<article id="manifiestos"> 
				<h5> Seccion de manifiestos </h5>
				<p> En esta sección se puede añadir, modificar o eliminar manifiestos. </p>
				<p> Por ejemplo: Si queremso añadir un manifiesto, siempre que ese titulo no este ya guardado, podremos añadir el nuevo manifiesto. </p>
			</article>
			<article id="usuarios"> 
				<h5> Seccion de usuarios </h5>
				<p> En esta sección se puede modificar el tipo de usuario o eliminar usuarios. </p>
				<p> Por ejemplo: Si queremos cambiar el tipo de usuario. Vamos a <i> ver todos los usuarios </i>, pulsamos en editar y cuando nos aparezca el formulario cambiamos el tipo de usuario pulsando el boton modificar tipo de usuario. </p>
			</article>
		</main>
	</section>
@stop