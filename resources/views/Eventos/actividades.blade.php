@extends('layout')
@section('contenido')
<!-- SECCION DE ACTIVIDADES -->
<section class="container-fluid">
    <header class="container-fluid">
    <hr class="mt-5">
    <main class="row">
        <aside class="col-lg-12 text-center">
            <h2 class="h2-title">ACTIVIDADES</h2>
            <hr class="hr-title">
        </aside>
    </main>
    <hr class="mb-5">
    </header>
    <?php
        /* RECOGEMOS DATOS DE LA BASE DE DATOS PARA MOSTRARLOS EN LA PÁGINA */
		for ($i=0; $i < count($actividades) ; $i++) 
		{ 
			$titulo_actividades = $actividades[$i]['titulo'];
			$fecha_actividades = $actividades[$i]['fecha'];
    ?>
        <main class="container-fluid mb-3">  
            <section class="card"> 
                <section class="row no-gutters">
                    <section class="col-md-2">
                        <?php 
                        //Abrimos la carpeta ACTIVIDADES
                        $directory="imagenes/Eventos";

                       
                        $dirint = dir($directory);
                        while (($archivo = $dirint->read()) !== false) 
                        {
                            if($archivo == $actividades[$i]['imagen'])
                            { 
                        ?>
                            <a href="<?= $directory."/".$archivo?>" target="_blank">
                            <img id="imagenes-noticias"  class="img-responsive" src="<?php echo $directory."/".$archivo?>" title="<?= $archivo ?>">
                            </a>
                        <?php
                                }
                            }
                            $dirint->close();
                        ?> 
                    </section>
                    <section class="col-md-10">
                        <article class="card-body">
                            <p class="card-title"> <?= $titulo_actividades ?> </p>
                            <p class="card-title"> <?= $fecha_actividades ?> </p>
                            <a target="_blank" class="stretched-link" href="{{ url('/actividades/'.$titulo_actividades) }}"> Ver más </a>
                        </article>
                    </section>
                </section>
            </section>
        </main>
    <?php 
        } /* FIN RECOGER DATOS DE LA BBDD*/  
    ?>
    <article class='paginado'>
    </article>
</section>
<!-- FIN SECCION DE ACTIVIDADES -->
@stop