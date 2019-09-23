@extends('layout')
@section('contenido')
<body>
<section class="container mb-5">
    <!-- <header class="container-fluid hover-titulo"> -->
    <header class="container-fluid"> <!--modificado 23-9-19 Isaac-->
    <hr class="mt-5">
    <main class="row">
        <aside class="col-lg-12 text-center">
            <h2 class="h2-title"> manifiestos </h2>
            <hr class="hr-title">
        </aside>
    </main>
    <hr class="mb-5">
    </header>
    <main class="container-fluid">
        <article>       
        <?php 
        	for ($i = 0; $i < count($manifiestos); $i++ ){ 
        		//$id_manifiesto = $manifiestos[$i]['id'];
        		$titulo_manifiesto = $manifiestos[$i]['titulo'];
        		$fecha_manifiesto = $manifiestos[$i]['fecha'];
        ?>
            <main class="col-12 p-2">
                <section class="border d-flex rounded pt-1 pb-1"> <!-- Bloque fecha, texto y pdf -->
                    <i class="fa fa-file-pdf h1 m-3"> </i>
                    <section class="pr-4 pt-1 pb-1" id="bloque-manifiestos">
                        <!-- Titulo manifiesto -->
                        <span class="small"><?= $fecha_manifiesto ?></span> <br>
                        <span class="h3"> <?= $titulo_manifiesto ?> </span>
                        <!-- /Fin titulo manifiesto -->

                        <section> <!-- Seccion para mostrar pdf manifiesto -->
                        <?php 
                            //Abrimos la carpeta Manifiestos
                            $directory="PDF/Manifiestos/";
                            $dirint = dir($directory);
                            while (($archivo = $dirint->read()) !== false) 
                            {
                                if($archivo == $manifiestos[$i]['imagen'])
                                { 
                            ?>
                                <a href="<?= $directory."/".$archivo?>" target="_blank">
                                <?= $archivo ?>
                                </a>
                        <?php
                               }
                            }
                            $dirint->close();
                        ?>
                        </section> <!-- /Fin Seccion para mostrar pdf manifiesto -->
                    </section>
                </section> <!-- /Fin Bloque fecha, texto y pdf -->
            </main>
        <?php 
            }  //Cerramos for
        ?>
        </article>
    </main>
</section>
</body>
@stop