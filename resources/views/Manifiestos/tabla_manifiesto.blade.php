@extends('layout_administrador')
@section('formularios')
<form enctype="multipart/form-data" action="#" id="form_select_modificar_manifiesto" method="POST">
  <h3 class="titulo-formulario p-3"> Tabla de manifiestos </h3>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <!-- Seccion tabla -->
  <section class="table-responsive mt-4">
    <table class="table">
      <caption>Lista de manifiestos</caption>
      <thead class="table-primary">
        <tr>
          <th> # </th>
          <th> Id </th>
          <th width="60%"> Titulo </th>
          <th> Fecha </th>
          <?php 
            $url = Request::path();
            $url_modificar = 'administrador/modificar_manifiesto';
            //si la url es para la pagina de modificar_manifiestos mostramos el boton editar
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
        for($i=0; $i < count($manifiestos); $i++){
      ?>
      <tr>
        <td> {{ ($i+1) }} </td>
        <td> {{ $manifiestos[$i]['id'] }} </td>
        <td> {{ $manifiestos[$i]['titulo'] }} </td>
        <th> {{ $manifiestos[$i]['fecha'] }} </th>
          <?php 
            //$url = Request::fullUrl();
            //si la url es para la pagina de modificar_manifiestos mostramos el boton editar
            if($url == $url_modificar) 
            {
          ?>
          <td> 
          <a href="{{ url('/administrador/modificar_manifiesto/'.$manifiestos[$i]['id']) }}" class="btn btn-outline-primary" role="button">editar</a> 
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
          //Si la url es distinta a la de modificar_manifiestos, mostramos boton para añadir_manifiesto
          if($url != $url_modificar) 
          {
      ?>
            <a href="{{ url('/administrador/nuevo_manifiesto') }}" class="btn btn-outline-success float-right mb-5" role="button">añadir nuevo manifiesto</a>
      <?php
          } //Cerramos if
      ?>
    <span class="w-100" id="boton_modificar"></span>
  </section>
  <!-- /FIN seccion boton --> 
</form>
@stop