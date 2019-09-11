@extends('layout_administrador')
@section('formularios')
<section id="tabla_usuarios" class="table-responsive mt-4 text-center">
    <h3 class="titulo-formulario pb-3"> Tabla de usuarios </h3>
    <table class="table">
      <caption>Lista de usuarios</caption>
      <thead class="table-secondary table-sm">
        <tr>
          <th class="pl-3"> <i class="fas fa-user pr-3"></i> </th>
          <th> Nick </th>
          <th> Nombre </th>
          <th> Email </th>
          <th> Fecha de nacimiento </th>
          <th> Tipo de usuario </th>
          <th> Editar usuario </th>
          <th> Eliminar usuario </th>
        </tr>
      </thead>
      <tbody>
      <?php
        for($i=0; $i < count($usuarios); $i++){
      ?>
      <tr>
        <td> {{ ($i+1) }} </td>
        <td> {{ $usuarios[$i]['nick'] }} </td>
        <td> {{ $usuarios[$i]['nombre_completo'] }} </td>
        <td> {{ $usuarios[$i]['email'] }} </td>
        <td> <?= date("d-m-Y",strtotime($usuarios[$i]['fecha_nacimiento'])) ?> </td>
        <td> {{ $usuarios[$i]['tipo'] }} </td>
        <td>
        	<a href="{{ url('/administrador/modificar_usuario/'.$usuarios[$i]['id']) }}" class="btn btn-outline-primary btn-sm" role="button">editar</a> 
        </td>
        <?php if($usuarios[$i]['tipo'] == 'Admin'){ ?>
        <td class="w-25"> <!-- <td> cuando la sesion es de tipo Administrador  -->
          <span> No se puede eliminar usuario Administrador </span>
        <?php } else { ?>
        <td> <!-- <td> cuando los usuarios son estandar  -->
          <form action="{{ url('/administrador/eliminar_usuario/'.$usuarios[$i]['id']) }}" method="POST" name="form-eliminar-noticias">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-outline-danger btn-sm">eliminar</button> 
          </form>
        <?php } ?>
        </td>
      </tr>
      <?php
  		}
  	  ?>
      </tbody>
      </table>
</section>
@stop