@extends('layout')
@section('contenido')
	<section class="container mt-5 mb-5 bg-white">
		<article class="col-lg-10 m-auto pt-3">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Mi perfil</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Modificar contraseña</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="prov_mun-tab" data-toggle="tab" href="#prov_mun" role="tab" aria-controls="prov_mun" aria-selected="false">Modificar provincia y municipio</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="eli_usu-tab" data-toggle="tab" href="#eli_usu" role="tab" aria-controls="eli_usu" aria-selected="false">Eliminar usuario</a>
			  </li>
			</ul>
			<div class="tab-content" id="myTabContent">
			  	<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
			  		<h6 class="font-weight-bold mt-3 pb-2 text-center"> Informacion basica del usuario </h6>
					<form role="form" id="formulario_mi_perfil_info_usu" method="POST" action="{{ url('/mi_perfil/guardar_nuevos_datos') }}" class="row">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id_usuario" value="{{  $usuario->id }}">
						<div class="form-group col-md-12 col-lg-6">
							<label for="nick">Nick name del usuario </label>
					      	<input type="text" class="form-control" id="nick" name="nick" placeholder="Nick name del usuario" value="{{ $usuario->nick }}" required>
					    </div>

						<div class="form-group col-md-12 col-lg-6">
							<label for="nombre_completo">Nombre completo del usuario </label>
					      	<input type="text" class="form-control" id="nombre_completo" name="nombre_completo" placeholder="Nombre completo del usuario" value="{{ $usuario->nombre_completo }}" required>
					    </div>

					    <div class="form-group col-md-12 col-lg-6">
					    	<label for="email">E-mail del usuario </label>
					      	<input type="email" class="form-control" id="email" name="email" placeholder="Correo electronico del usuario" value="{{ $usuario->email }}" required>
					    </div>

					    <div class="form-group col-md-12 col-lg-6">
					    	<label for="fecha_nacimiento">Fecha de nacimiento del usuario </label>
					      	<input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de nacimiento del usuario" value="{{ $usuario->fecha_nacimiento }}" required>
					    </div>

					    <div class="form-group col-md-12 col-lg-6">
					    	<label for="sexo">Sexo del usuario </label>
					      	<input type="text" class="form-control" id="sexo" name="sexo" placeholder="Sexo del usuario" value="{{ $usuario->sexo }}" required>
					    </div>

					    <div class="form-group col-md-12 col-lg-6">
					    	<label for="tipo">Tipo de usuario </label>
					      	<input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo de usuario" value="{{ $usuario->tipo }}" disabled>
					    </div>

						<div class="form-group col-md-12 mt-1">
					    	<input type="submit" class="btn btn-outline-primary float-right ml-5" value="Modificar"> 
					    	<input type="reset" class="btn btn-outline-danger float-right" value="Datos originales">
					    </div>
					</form>
				</div>
				<div class="tab-pane fade pb-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			  		<h6 class="font-weight-bold mt-3 pb-2 text-center"> Modificar contraseña </h6>
			  		<form role="form" id="formulario_mi_perfil_contrasena" method="POST" action="{{ url('/mi_perfil/guardar_nueva_contrasena') }}" class="row">
				  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id_usuario" value="{{  $usuario->id }}">
					  	<div class="form-group col-md-12 col-lg-6">
					        <label for="password">Contraseña del usuario</label>
					        <div class="input-group">
					      		<input id="password" name="password" type="password" class="form-control" value="{{ $usuario->password }}">
					      		<div class="input-group-append">
									<button id="show_password" class="btn btn-primary" type="button" onclick="return mostrarContrasena()"> 
										<span class="fa fa-eye-slash icon"></span> 
									</button>
								</div>
					    	</div>
					    </div>

					    <div class="form-group col-md-12 col-lg-6"></div>
					    <div class="form-group col-md-12 col-lg-6"></div>

				    	<div class="form-group col-md-12 col-lg-6">
					    	<input type="submit" class="btn btn-outline-primary float-right" value="Modificar"> 
					    </div>
					</form>
				</div>
				<div class="tab-pane fade pb-4" id="prov_mun" role="tabpanel" aria-labelledby="prov_mun-tab">
				  	<h6 class="font-weight-bold mt-3 pb-2 text-center"> Modificar provincia y municipio </h6>
				  	<form role="form" id="formulario_mi_perfil_provincia_municipio" method="POST" action="{{ url('/mi_perfil/guardar_provincia_municipio') }}" class="row">
				  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id_usuario" value="{{  $usuario->id }}">

				  		<div id="div_provincia" class="form-group col-md-12 col-lg-6">
						    <label for="provincia_1">Provincia del usuario </label>
						     <input type="text" class="form-control" id="provincia_1" name="provincia_1" placeholder="Provincia" onclick="return mostrarSelectProvinciaMunicipio()" value="<?= $provincia[0]['provincia']?>" required>
						</div>

					    <div id="div_provincia_2" class="form-group col-md-12 col-lg-6">
					    	<label class="control-label" for="provincias_2"> Provincia del usuario </label>
					    	<select onchange="return Provincia()" class='form-control' name='provincia' id='selectProvincia'>
			                    <option  value="" disabled selected>Selecciona una provincia </option>
			                    <?php for($i=0;$i<count($todas_provincias);$i++) { 
			                                $id_provincia = $todas_provincias[$i]['id'];
			                                $provincia = $todas_provincias[$i]['provincia'];
			                    ?>
			                                <option value='<?= $id_provincia ?>'><?= $provincia ?></option>
			                    <?php   } ?>
			                </select>
			            </div>

					    <div id="div_municipio" class="form-group col-md-12 col-lg-6">
					    	<label for="municipio">Municipio del usuario </label>
					      	<input type="text" class="form-control" id="municipio" name="municipio" placeholder="Municipio" value="<?= $municipio[0]['municipio']?>" required>
					    </div>

					    <div id="div_municipios_2" class="form-group col-md-12 col-lg-6">
			                <label class="control-label" for="municipios"> Municipio </label> <br>
			                <select class='form-control' id="municipios" name="municipios">
			                    <option value="" disabled selected> Selecciona un municipio </option>
			                </select>
			            </div>

			            <div class="form-group col-md-12 col-lg-6"></div>
					    <div class="form-group col-md-12 col-lg-6"></div>

				    	<div class="form-group col-md-12">
					    	<input type="submit" class="btn btn-outline-primary float-right" value="Modificar"> 
					    </div>
			        </form>
		        </div>
		        <!--  Nuevo añadido 23-9-19 Isaac -->
		        <div class="tab-pane fade pb-4" id="eli_usu" role="tabpanel" aria-labelledby="eli_usu-tab">
			  		<h6 class="font-weight-bold mt-3 pb-2 text-center"> Eliminar usuario </h6>
			  		<form role="form" id="formulario_mi_perfil_eli_usu" method="POST" action="{{ url('/mi_perfil/eliminar_usuario') }}" class="row">
			  			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			  			<input type="hidden" name="id_usuario" value="{{  $usuario->id }}">
			  			<p class="m-2"> Si eliminas tu usuario, podrias perder todos tus datos y para volver a tener un perfil con LGTBCrevillent tendrás que volver a registrarte. </p>
			  			<div class="form-group col-md-12 col-lg-6"></div>
				    	<div class="form-group col-md-12">
					    	<input type="submit" class="btn btn-outline-danger float-right" value="Eliminar usuario"> 
					    </div>
					</form>
				</div>
				<!-- /FIN nuevo añadido 23-9-19 Isaac -->
			</div>
		</article>
	</section>
@stop