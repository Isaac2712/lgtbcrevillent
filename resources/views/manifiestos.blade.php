@extends('layout')
@section('contenido')
<body>
<section class="container mb-5">
    <header class="container hover-titulo">
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
            		$id_manifiesto = $manifiestos[$i]['id'];
            		$titulo_manifiesto = $manifiestos[$i]['titulo'];
            		$fecha_manifiesto = $manifiestos[$i]['fecha'];
            ?>
                <main class="col-12">                              
                    <?php ?>
                    <p class="card-text"> <a href="definitivopdf.php?id=<?= $id_manifiesto ?>" target="_blank"> <?= $titulo_manifiesto ?> </a> </p>
                    <p class="card-text fecha-reivi">  <i> <?= "<i>".$fecha_manifiesto."</i>"; ?>  </i> </p>
                </main>
        <?php 
                }  
        ?>
        </article>
    </main>
</section>
</body>
@stop