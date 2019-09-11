@extends('layout_administrador')
@section('formularios')
<form enctype="multipart/form-data" action="#" id="form_select_modificar_noticia" method="POST">
  <h3 class="titulo-formulario p-3"> Tabla de noticias </h3>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <!-- Seccion tabla -->
  <section class="table-responsive mt-4">
    <table class="table">
      <caption>Lista de noticias</caption>
      <thead class="table-primary">
        <tr>
          <th> # </th>
          <th> Id </th>
          <th> Titulo </th>
          <th> Fecha </th>
          <?php 
            $url = Request::path();
            $url_modificar = 'administrador/modificar_noticia';
            //si la url es para la pagina de modificar_noticias mostramos el boton editar
            if($url == $url_modificar) 
            {
          ?>
          <th> Boton </th>
          <?php 
            } //Cerramos if
          ?>
        </tr>
      </thead>
      <tbody>
      <?php
        for($i=0; $i < count($noticias); $i++){
      ?>
      <tr>
        <td> {{ ($i+1) }} </td>
        <td> {{ $noticias[$i]['id'] }} </td>
        <td> {{ $noticias[$i]['titulo'] }} </td>
        <th> {{ $noticias[$i]['fecha'] }} </th>
          <?php 
            //$url = Request::fullUrl();
            //si la url es para la pagina de modificar_noticias mostramos el boton editar
            if($url == $url_modificar) 
            {
          ?>
          <td> 
          <a href="{{ url('/administrador/modificar_noticia/'.$noticias[$i]['id']) }}" class="btn btn-outline-primary" role="button">editar</a> 
          </td>
          <?php
            } //Cerramos if comprobando url
          ?>
        </tr>
      </tbody>
      <?php
        } //cerramos bucle for
      ?>
      </table>
      <?php 
          //Si la url es distinta a la de modificar_noticias, mostramos boton para añadir_noticia
          if($url != $url_modificar) 
          {
      ?>
            <a href="{{ url('/administrador/nueva_noticia') }}" class="btn btn-outline-success float-right" role="button">añadir nueva noticia</a>
      <?php
          } //Cerramos if
      ?>
    <span class="w-100" id="boton_modificar"></span>
  </section>
  <!-- /FIN seccion boton --> 
</form>
@stop