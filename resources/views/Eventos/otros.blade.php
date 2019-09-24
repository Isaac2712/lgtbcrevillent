@extends('layout')
@section('contenido')
<!-- SECCION DE OTROS -->
<section class="container-fluid mb-5">
    <header class="container-fluid">
    <hr class="mt-5">
    <main class="row">
        <aside class="col-lg-12 text-center">
            <h2 class="h2-title">OTROS</h2>
            <hr class="hr-title">
        </aside>
    </main>
    <hr class="mb-5">
    </header>
    <?php
        /* RECOGEMOS DATOS DE LA BASE DE DATOS PARA MOSTRARLOS EN LA PÁGINA */
		for ($i=0; $i < count($otros) ; $i++) 
		{ 
			$titulo_otros_eventos = $otros[$i]['titulo'];
			$fecha_otros_eventos = $otros[$i]['fecha'];
    ?>
        <main class="container-fluid mb-3">  
            <section class="card"> 
                <section class="row no-gutters">
                    <section class="col-md-2">
                        <?php 
                        //Abrimos la carpeta OTROS
                        $directory="imagenes/Eventos";

                       
                        $dirint = dir($directory);
                        while (($archivo = $dirint->read()) !== false) 
                        {
                            if($archivo == $otros[$i]['imagen'])
                            { 
                        ?>
                            <a href="<?= $directory."/".$archivo?>" target="_blank">
                            <img id="imagenes-tipo-evento"  class="img-responsive" src="<?php echo $directory."/".$archivo?>" title="<?= $archivo ?>">
                            </a>
                        <?php
                                }
                            }
                            $dirint->close();
                        ?> 
                    </section>
                    <section class="col-md-10">
                        <article class="card-body">
                            <p class="card-title"> <?= $titulo_otros_eventos ?> </p>
                            <p class="card-title"> <?= $fecha_otros_eventos ?> </p>
                            <a target="_blank" class="stretched-link" href="{{ url('/otros/'.$titulo_otros_eventos) }}"> Ver más </a>
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
<!-- FIN SECCION DE OTROS -->
@stop