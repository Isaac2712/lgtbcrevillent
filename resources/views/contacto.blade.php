@extends('layout')
@section('contenido')
	<header class="container">
        <section>
        	<!--<header class="hover-titulo">-->
            <header><!-- modificado 23-9-19 Isaac -->
	        	<hr class="mt-5">
	        	<aside class="col-lg-12 text-center">
	                <h2 class="h2-title">lgtbcrevillent</h2>
	                <hr class="hr-title mb-3">
	            </aside>
	            <hr class="mb-5">
	        </header>
            <main>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3133.3689364316306!2d-0.8093943846686926!3d38.24774857967619!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd63b96ba71ce7eb%3A0xd0c9e28cb9ba0256!2sPla%C3%A7a+Dr.+Mas+Candela%2C+15%2C+03330+Crevillent%2C+Alicante!5e0!3m2!1ses!2ses!4v1525106434206" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
            </main>
             <!--<footer class="hover-titulo">-->
            <footer><!-- modificado 23-9-19 Isaac -->
	            <hr class="mt-5">
	            <aside class="col-lg-12 text-center mb-4">
	                <h2 class="h2-title">Contactenos</h2>
	                <hr class="hr-title mb-3">
	            </aside>
	            <hr class="mb-5">
        	</footer>
        </section>
    </header>
    <main class="container mb-5">
        <section>
            <form role="form" id="Formulario" action="{{ url('/contacto/enviar_mensaje') }}" method="POST">
            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label class="control-label" for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduzca su nombre" required autofocus value="" />
                </div>   
                <div class="form-group">
                    <label class="control-label" for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Introduzca sus apellidos" required autofocus value="" />
                </div>
                <div class="form-group">
                    <label class="control-label" for="email">Dirección de Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Introduzca su correo electrónico" required value="" />
                </div>
                <div class="form-group">
                    <label class="control-label" for="mensaje">Mensaje</label>
                    <textarea rows="5" cols="30" class="form-control" id="mensaje" name="mensaje" placeholder="Introduzca su mensaje" required ></textarea>
                </div>
                <div class="form-group">                
                    <input type="submit" class="btn btn-primary" value="Enviar">
                    <input type="reset" class="btn btn-outline-secondary" value="Limpiar">           
                </div>
            </form>
        </section>   
    </main>
@stop