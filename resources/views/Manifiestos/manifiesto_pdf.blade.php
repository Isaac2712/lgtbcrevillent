<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>LGTBCREVILLENT</title>
	<link rel="icon" href="{{ public_path('imagenes/LOGO.jpg') }}" type="image/gif" sizes="16x16">
	<link rel="stylesheet" href="{{ public_path('css/app.css') }}">
  	<link rel="stylesheet" href="{{ public_path('css/style.css') }} ">
  	<link rel="stylesheet" href="{{ public_path('favicon/css/all.css') }}"> <!--load all styles -->
</head>
<body>
	<?php
		for ($i = 0 ; $i < count($manifiesto); $i++ ) { 
			$titulo_manifiesto = $manifiesto[$i]['titulo'];
			$fecha_manifiesto = $manifiesto[$i]['fecha'];
			$imagen_manifiesto = $manifiesto[$i]['imagen'];
			$texto_manifiesto = $manifiesto[$i]['texto'];
	?>
	<header class="p-3">
		<span class="d-inline-block pl-2 pt-2 pb-1 text-left font-weight-bold"> LGTBCrevillent </span>
		<span class="d-inline-block w-75 pr-2 pt-2 pb-1 text-right"> <?= $fecha_manifiesto ?> </span>
		<div class="border-bottom border-secondary w-75 m-auto"></div>
	</header>
	
	<main class="p-3 text-center">
		<!-- Seccion para el titulo -->
    	<section class="text-left mt-1 mb-2">
    		<h6 class="font-weight-bold text-uppercase"> {{ $manifiesto[$i]['titulo'] }} </h6>
    	</section>
    	<!-- FIN seccion para el titulo -->
    	<!-- Seccion para el texto -->
    	<section class="text-left">
    		<p> <?php echo utf8_decode($manifiesto[$i]['texto']); ?> </p>
    	</section>
    	<!-- Fin seccion para el titulo -->
    	<!-- Seccion para la imagen -->
    	<section class="pt-5">
		<?php 
            //Abrimos la carpeta Manifiestos
            $directory="imagenes/Manifiestos/";
            $dirint = dir($directory);
            while (($archivo = $dirint->read()) !== false) 
            {
                if($archivo == $manifiesto[$i]['imagen'])
                { 
            ?>
                <a href="<?= $directory."/".$archivo?>" target="_blank">
                <img src="<?php echo $directory."/".$archivo?>" title="<?= $archivo ?>" width="500">
                </a>
        <?php
               }
            }
            $dirint->close();
        ?>
        </section>
        <!-- FIN seccion para la imagen -->
	</main>

	<footer>
		
	</footer>
	<?php } //Cerramos for ?>
</body> 
</html>