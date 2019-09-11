@extends('layout')
@section('contenido')
<section class="container mt-5">
    <header class="hover-titulo">
    <hr class="mt-5">
    <main class="row">
        <aside class="col-lg-12 text-center">
            <h2 class="h2-title"> ¿quienes somos? </h2>
            <hr class="hr-title">
        </aside>
    </main>
    <hr class="mb-4">
    </header>
    <article id="articulo-quienes-somos" class="pr-3 pl-3">
        <p style="word-wrap: break-word;">
            La Asociación LGTB de Crevillent es una asociación de lesbianas, gays, transexuales y bisexuales, creada el 25 de Abril de 2015.
        </p>

        <h1> Filosofía </h1>
            
        <p style="word-wrap: break-word;">
           LGTB Crevillent está abierto a cualquier persona, independientemente de su orientación sexual, ya que para la participación y colaboración no es necesario ser gay, lesbiana, transexual o bisexual, sino creer en la igualdad social y legal entre las personas.
        </p>
            
        <p style="word-wrap: break-word;">
           Esta Asociación, pionera en Crevillent, supondrá el apoyo y soporte para todo aquel que se sienta solo, desubicado o con cualquier otra inquietud.
        </p>
    </article>
    <p class="small float-right"> Hecho por Isaac Marroquí </p>
</section>
<section class="container mt-5 mb-5">
    <aside class="embed-responsive embed-responsive-21by9">
      <iframe class="embed-responsive-item" ng-show="showvideo" src="https://www.youtube.com/embed/3fmYkJnuiPo" frameborder="0" allowfullscreen></iframe>
    </aside>
</section>
@stop