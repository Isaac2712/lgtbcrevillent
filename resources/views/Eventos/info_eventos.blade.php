@extends('layout')
@section('contenido')
	<?php
		$titulo_evento = ""; $horario_evento = ""; $lugar_evento = ""; $direccion_evento = "";
		$imagen_evento = ""; $localidad_evento = ""; $fecha_evento = ""; $texto_evento = "";
		$telefono_evento = "";
		
		for ($i=0; $i <count($info_evento) ; $i++) { 
			$titulo_evento = $info_evento[$i]['titulo']; //OK
			$horario_evento = $info_evento[$i]['horario']; //OK
			$lugar_evento = $info_evento[$i]['lugar']; //OK
			$direccion_evento = $info_evento[$i]['direccion']; //OK
			$imagen_evento = $info_evento[$i]['imagen'];
			$localidad_evento = $info_evento[$i]['localidad']; //OK
			$fecha_evento = $info_evento[$i]['fecha']; //OK
			$texto_evento = $info_evento[$i]['texto']; //OK
			$telefono_evento = $info_evento[$i]['telefono']; //OK
		}
	?>
	<section class="container mt-5 mb-5">
		<header class="shadow-lg mt-2 p-2 mb-2 bg-white rounded">
			<h1 class="text-uppercase"> <?= $titulo_evento ?> </h1>
	    </header>
	    <main class="">
	    	<?php 
	            //Abrimos la carpeta Eventos
	            $directory="imagenes/Eventos/";
	            $dirint = dir($directory);
	            while (($archivo = $dirint->read()) !== false) 
	            {
	                if($archivo == $imagen_evento)
	                { 
	            ?>
	                <a href="<?= $directory."/".$archivo?>" target="_blank">
	                <img class="rounded img-fluid img-thumbnail" src="<?= $directory."/".$archivo?>" title="<?= $archivo ?>" style="max-width: 50%;">
	                </a>
	        <?php
	               }
	            }
	            $dirint->close();
	        ?>
	    </main>
	    <footer class="mt-2">
	    	<section class="col-12 row p-1">
				<span class="col-4 col-md-2 text-uppercase font-weight-bold"> Fecha: </span>
				<span class="col-8 col-md-10 pl-3 texto-info-eventos"> {{ $fecha_evento }}  </span>
			</section>
			<section class="col-12 row p-1">
				<span class="col-4 col-md-2 text-uppercase font-weight-bold"> Teléfono: </span>
				<span class="col-8 col-md-10 pl-3 texto-info-eventos"> {{ $telefono_evento }}   </span>	
			</section>
			<section class="col-12 row p-1">
				<span class="col-4 col-md-2 text-uppercase font-weight-bold"> Descripción: </span>
				<p class="col-8 col-md-10 pl-3 texto-info-eventos">{{ $texto_evento }} </p>
			</section>
			<section class="col-12 row p-1">
				<span class="col-4 col-md-2 text-uppercase font-weight-bold"> Dirección: </span>
				<span class="col-8 col-md-10 pl-3 texto-info-eventos"> {{ $direccion_evento }}  </span>
			</section>
			<section class="col-12 row p-1">
				<span class="col-4 col-md-2 text-uppercase font-weight-bold"> Lugar: </span>
				<span class="col-8 col-md-10 pl-3 texto-info-eventos"> {{ $lugar_evento }}  </span>
			</section>
			<section class="col-12 row p-1">
				<span class="col-4 col-md-2 text-uppercase font-weight-bold"> Horario: </span>
				<span class="col-8 col-md-10 pl-3 texto-info-eventos"> {{ $horario_evento }}  </span>
			</section>
			<section class="col-12 row p-1">
				<span class="col-4 col-md-2 text-uppercase font-weight-bold"> Localidad: </span>
				<span class="col-8 col-md-10 pl-3 texto-info-eventos"> {{ $localidad_evento }} </span>
			</section>
	    </footer>
	</section>
@stop