@extends('layout_administrador')
@section('formularios')
<form enctype="multipart/form-data" action="#" id="form_select_modificar_evento" method="POST">
  <h3 class="titulo-formulario p-3"> Tabla de eventos </h3>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <!-- Seccion tabla -->
  <section class="table-responsive mt-4">
    <table class="table">
      <caption>Lista de eventos</caption>
      <thead class="table-primary">
        <tr>
          <th> # </th>
          <th> Id </th>
          <th> Titulo </th>
          <th> Fecha </th>
          <?php 
            $url = Request::path();
            $url_modificar = 'administrador/modificar_evento';
            //si la url es para la pagina de modificar_eventos mostramos el boton editar
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
        for($i=0; $i < count($eventos); $i++){
      ?>
      <tr>
        <td> {{ ($i+1) }} </td>
        <td> {{ $eventos[$i]['id'] }} </td>
        <td> {{ $eventos[$i]['titulo'] }} </td>
        <th> {{ $eventos[$i]['fecha'] }} </th>
          <?php 
            //$url = Request::fullUrl();
            //si la url es para la pagina de modificar_eventos mostramos el boton editar
            if($url == $url_modificar) 
            {
          ?>
          <td> 
          <a href="{{ url('/administrador/modificar_evento/'.$eventos[$i]['id']) }}" class="btn btn-outline-primary" role="button">editar</a> 
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
          //Si la url es distinta a la de modificar_eventos, mostramos boton para añadir_evento
          if($url != $url_modificar) 
          {
      ?>
            <a href="{{ url('/administrador/nuevo_evento') }}" class="btn btn-outline-success float-right" role="button">añadir nuevo evento</a>
      <?php
          } //Cerramos if
      ?>
    <span class="w-100" id="boton_modificar"></span>
  </section>
  <!-- /FIN seccion boton --> 
</form>
@stop