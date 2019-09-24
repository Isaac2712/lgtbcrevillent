@extends('layout')
@section('contenido')
<!-- SECCION DE EVENTOS -->
<section class="container-fluid">
    <header class="container-fluid">
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
        <article class="row"> 
         <?php  
            $tipo_evento = array('concentraciones', 'actividades', 'mesaredonda', 'aniversario', 'otros' );
            $carpeta = "../imagenes/TipoEvento/";
            /* RECOGEMOS DATOS DE LA BASE DE DATOS PARA MOSTRARLOS EN LA PÁGINA */
            for($i = 0; $i < count($tipo_evento); $i++){
        ?>     
        <main class="col-lg-3 col-md-6 col-sm-6 text-center mb-3 d-flex flex-wrap">  
            <section class="card bg-light">
                <form action="" method="POST">
                    <header class="card-header">
                        <img id="imagenes-eventos" class="img-responsive" src="<?= $carpeta.$tipo_evento[$i].".png" ?>" title="Logo concentracion">
                    </header>   
                    <section class="card-body d-flex flex-column">
                        <header>
                            <?php
                                if($tipo_evento[$i] == "mesaredonda"){
                                    echo "<p class='card-title'> Mesa redonda </p>";
                                }
                                else
                                {
                            ?>
                            <p class="card-title"> {{ ucfirst($tipo_evento[$i]) }} </p>
                            <?php
                                }
                            ?>
                        </header>
                        <body>
                            <a class="boton-even text-white p-2 border rounded mb-2" href="{{ url("/".$tipo_evento[$i]) }}"> Ver más </a>
                        </body>
                        <footer>
                            <span><i><small></small></i></span>
                        </footer>
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
    <!-- <header class="container-fluid hover-titulo"> -->
    <header class="container-fluid"> <!--modificado 23-9-19 Isaac-->
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