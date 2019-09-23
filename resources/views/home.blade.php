@extends('layout')
@section('contenido')
<!-- SECCION DE EVENTOS -->
<section class="container-fluid">
    <header class="container-fluid hover-titulo">
    <hr class="mt-5">
    <main class="row">
        <aside class="col-lg-12 text-center">
            <h2 class="h2-title"> eventos </h2>
            <hr class="hr-title">
        </aside>
    </main>
    <hr class="mb-5">
    </header>
    <main class="container-fluid">
        <article id="artEven" class="row">       
        <?php  
            /* RECOGEMOS DATOS DE LA BASE DE DATOS PARA MOSTRARLOS EN LA PÁGINA */
            for($i = 0; $i < count($eventos); $i++){
                $id_evento = $eventos[$i]['id'];
                $titulo_evento = $eventos[$i]['titulo'];
                $texto_evento = $eventos[$i]['texto'];
                $tipo_evento = $eventos[$i]['tipo'];
        ?>
        <!-- MOSTRAMOS DATOS EN LA PAGINA WEB -->
        <main class="col-lg-3 col-md-6 col-sm-6 text-center mb-3 d-flex flex-wrap">  
            <section class="card bg-light">
                <form action="" method="POST">
                    <input type='hidden' name='id' value='<?= $id_evento ?>'>
                    <header class="card-header"> 
                        <?php 
                            /* $directory="imagenes/Eventos/";
                            $dirint = dir($directory);
                            while (($archivo = $dirint->read()) !== false) 
                            {
                                if($archivo == $eventos[$i]['imagen'])
                                { ?>
                                    <a href="<?= $directory."/".$archivo?>" target="_blank">
                                    <img id="imagenes-eventos" class="img-responsive" src="<?php echo $directory."/".$archivo?>" title="<?= $archivo ?>">
                                    </a>
                            <?php    
                                }
                            }
                            $dirint->close(); */

                            //NUEVA CREACION EL 23-9-19 15:28 POR ISAAC
                            //Dependiendo del tipo de evento que seleccionamos al añadir el evento, escogeremos de la carpeta TipoEvento un logo u otro para mostrarlo en la sección de eventos de la web
                            //ACTIVIDADES
                            if($tipo_evento == "actividades")
                            { 
                    ?>
                                <img id="imagenes-eventos" class="img-responsive" src="imagenes/TipoEvento/actividades.jpg" title="Logo actividades">
                    <?php   
                            }
                            //MESA REDONDA
                            else if ($tipo_evento == "mesaredonda")
                            {
                    ?>
                                <img id="imagenes-eventos" class="img-responsive" src="imagenes/TipoEvento/mesaredonda.jpg" title="Logo mesa redonda">
                    <?php
                            }
                            //ANIVERSARIO
                            else if ($tipo_evento == "aniversario")
                            {
                    ?>
                                <img id="imagenes-eventos" class="img-responsive" src="imagenes/TipoEvento/aniversario.jpg" title="Logo aniversario">
                    <?php
                            }
                            //CONCENTRACION
                            else if ($tipo_evento == "concentracion")
                            {
                    ?>
                                <img id="imagenes-eventos" class="img-responsive" src="imagenes/TipoEvento/concentracion.jpg" title="Logo concentracion">
                    <?php
                            }
                            //OTROS
                            else if ($tipo_evento == "otros")
                            {
                    ?>
                                <img id="imagenes-eventos" class="img-responsive" src="imagenes/TipoEvento/otros.jpg" title="Logo otros">
                    <?php
                            }  
                    ?> 
                    </header>   
                    <section class="card-body">
                        <p class="card-title"> <?= $titulo_evento ?> </p>
                        <!-- <p class="card-text"> 
                            <?php 
                                // $textoEventoCorto = substr($texto_evento, 0, 20);
                                // echo $textoEventoCorto." ...";
                            ?> 
                        </p> -->
                        <a class="boton-even text-white p-2 border float-right rounded mb-2" href="{{ url($titulo_evento) }}"> Ver más </a>
                    </section>       
                </form>
            </section>
        </main>
        <?php 
            } /* FIN RECOGER DATOS DE LA BBDD*/  
        ?>
        </article>
    </main>
</section>
<!-- FIN SECCION DE EVENTOS -->

<!-- SECCION DE NOTICIAS -->
<section class="container-fluid">
    <header class="container-fluid hover-titulo">
    <hr class="mt-5">
    <main class="row">
        <aside class="col-lg-12 text-center">
            <h2 class="h2-title">noticias</h2>
            <hr class="hr-title">
        </aside>
    </main>
    <hr class="mb-5">
    </header>
    <?php  
        $totalNoticias = "";
        if(isset($_GET['comienzo']))
        {
            $comienzo=$_GET['comienzo'];
        }
        else
        {
            $comienzo=0;
        }  
        $num = 4;
        /* RECOGEMOS DATOS DE LA BASE DE DATOS PARA MOSTRARLOS EN LA PÁGINA */
        for($i = 0; $i < count($noticias); $i++){
            $id_evento = $noticias[$i]['id'];
            $titulo_noticia = $noticias[$i]['titulo'];
            $enlace_noticia = $noticias[$i]['enlace'];
    ?>
        <main class="container-fluid mb-3">  
            <section class="card"> 
                <section class="row no-gutters">
                    <section class="col-md-2">
                        <?php 
                        //Abrimos la carpeta Noticias
                        $directory="imagenes/Noticias/";
                        $dirint = dir($directory);
                        while (($archivo = $dirint->read()) !== false) 
                        {
                            if($archivo == $noticias[$i]['imagen'])
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
                            <p class="card-title"> <?= $titulo_noticia ?> </p>
                            <a target="_blank" href="<?= $enlace_noticia ?>" class="stretched-link"> <?= $enlace_noticia ?> </a>
                        </article>
                    </section>
                </section>
            </section>
        </main>
    <?php 
        } /* FIN RECOGER DATOS DE LA BBDD*/  
    ?>
    <article class='paginado'>
    <?php
        /*
        if($comienzo2>0)
        {
            echo "<a class='badge badge-primary' href='".$_SERVER['PHP_SELF']."?comienzo2=".($comienzo2-$num2)."'> ANTERIOR </a>";
        }
        if($comienzo2+$num2<count($totalLineas2))
        {
            echo "<a class='badge badge-primary' href='".$_SERVER['PHP_SELF']."?comienzo2=".($comienzo2+$num2)."'> SIGUIENTE </a>";
        }
        */
    ?>
    </article>
</section>
<!-- FIN SECCION DE NOTICIAS -->
@stop