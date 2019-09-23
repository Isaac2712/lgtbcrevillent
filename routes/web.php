<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//PagesController es el controlador principal
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@RouteHome']);

//Desconectar
Route::post('/desconectar', ['as' => 'desconectar' , 'uses' => 'Usuarios\ControllerUsuario@Desconectar']);

//Pagina para <acceder></acceder>
Route::get('/acceder', ['as' => 'acceder', 'uses' => 'Usuarios\ControllerUsuario@RouteAcceder']);

//Pagina para acceder
Route::get('/registrarse', ['as' => 'registrarse', 'uses' => 'Usuarios\ControllerUsuario@RouteRegistrarse']);

//Ajax acceder
Route::match(['get','post'], '/ajax/acceder', 'Usuarios\ControllerUsuario@Acceder');

//Ajax provincia
Route::post('/ajax/provincia', 'Usuarios\ControllerUsuario@Provincia');

//Ajax registro
Route::post('/ajax/registrarse', 'Usuarios\ControllerUsuario@Registrarse');

//Ruta del menu -> contacto
Route::get('/contacto', ['as' => 'contacto', 'uses' => 'PagesController@RouteContacto']);

//Ruta para enviar correo desde la pagina contacto
Route::post('/contacto/enviar_mensaje', 'PagesController@RouteEnviarMensaje');

//Ruta del menu -> manifiestos
Route::get('/manifiestos', ['as' => 'manifiestos', 'uses' => 'Manifiestos\ControllerManifiesto@RouteManifiestos']);

//Ruta al pdf de los manifiestos
Route::get('/manifiesto/{manifiesto}', 'Manifiestos\ControllerManifiesto@GenerarPDF');	

//Ruta del menu -> quienes somos
Route::get('/quienesSomos', ['as' => 'quienes_somos', 'uses' => 'PagesController@RouteQuienesSomos']);

//Ruta a error
Route::get('/error', ['as' => 'error', 'uses' => 'PagesController@RouteError']);

//Ruta a la parte ADMINISTRADOR de la web
Route::get('/administrador', ['as' => 'administrador', 'uses' => 'PagesController@RouteAdministrador']);

//Ruta del menu -> mi perfil
Route::get('/mi_perfil/{nick}', 'Usuarios\ControllerUsuario@RouteMiPerfil');

/* ---------- */
/*   EVENTOS  */
/* ---------- */
//Ruta para tabla de eventos
Route::get('/administrador/añadir_evento', ['as' => 'añadir_evento', 'uses' => 'Eventos\ControllerEvento@RouteTablaEventos']);

//Ruta formulario para añadir eventos
Route::get('/administrador/nuevo_evento', ['as' => 'nuevo_evento', 'uses' => 'Eventos\ControllerEvento@RouteNuevoEvento']);

//Ruta para eliminar eventos
Route::get('/administrador/eliminar_evento', ['as' => 'eliminar_evento', 'uses' => 'Eventos\ControllerEvento@RouteEliminarEvento']);

//Ruta para tabla de eventos
Route::get('/administrador/modificar_evento', ['as' => 'modificar_evento', 'uses' => 'Eventos\ControllerEvento@RouteTablaEventos']);

//Ruta para seleccionar evento
Route::get('/administrador/modificar_evento/{id}', 'Eventos\ControllerEvento@seleccionarEvento');

//Ruta para modificar el evento seleccionado
Route::post('/ajax/modificarEvento', 'Eventos\ControllerEvento@modificarEvento');

//Ajax Añadir eventos
Route::post('/ajax/anadirEvento', 'Eventos\ControllerEvento@anadirEvento');

//Ajax Eliminar eventos
Route::post('/ajax/eliminarEvento', 'Eventos\ControllerEvento@eliminarEvento');


/* ---------- */
/*  NOTICIAS  */
/* ---------- */
//Ruta para tabla de noticias
Route::get('/administrador/añadir_noticia', ['as' => 'añadir_noticia', 'uses' => 'Noticias\ControllerNoticia@RouteTablaNoticias']);

//Ruta formulario para añadir noticias
Route::get('/administrador/nueva_noticia', ['as' => 'nueva_noticia', 'uses' => 'Noticias\ControllerNoticia@RouteNuevaNoticia']);

//Ruta para eliminar noticias
Route::get('/administrador/eliminar_noticia', ['as' => 'eliminar_noticia', 'uses' => 'Noticias\ControllerNoticia@RouteEliminarNoticia']);

//Ruta para tabla de noticias
Route::get('/administrador/modificar_noticia', ['as' => 'modificar_noticia', 'uses' => 'Noticias\ControllerNoticia@RouteTablaNoticias']);

//Ruta para seleccionar evento
Route::get('/administrador/modificar_noticia/{id}', 'Noticias\ControllerNoticia@seleccionarNoticia');

//Ruta para modificar el evento seleccionado
Route::post('/ajax/modificarNoticia', 'Noticias\ControllerNoticia@modificarNoticia');

//Ajax Añadir noticias
Route::post('/ajax/anadirNoticia', 'Noticias\ControllerNoticia@anadirNoticia');

//Ajax Eliminar noticias
Route::post('/ajax/eliminarNoticia', 'Noticias\ControllerNoticia@eliminarNoticia');


/* ------------ */
/*  MANIFIESTOS */
/* ------------ */
//Ruta para tabla de manifiesto
Route::get('/administrador/añadir_manifiesto', ['as' => 'añadir_manifiesto', 'uses' => 'Manifiestos\ControllerManifiesto@RouteTablaManifiestos']);

//Ruta formulario para añadir manifiesto
Route::get('/administrador/nuevo_manifiesto', ['as' => 'nuevo_manifiesto', 'uses' => 'Manifiestos\ControllerManifiesto@RouteNuevoManifiesto']);

//Ruta para eliminar manifiesto
Route::get('/administrador/eliminar_manifiesto', ['as' => 'eliminar_manifiesto', 'uses' => 'Manifiestos\ControllerManifiesto@RouteEliminarManifiesto']);

//Ruta para tabla de manifiesto
Route::get('/administrador/modificar_manifiesto', ['as' => 'modificar_manifiesto', 'uses' => 'Manifiestos\ControllerManifiesto@RouteTablaManifiestos']);

//Ruta para seleccionar manifiesto
Route::get('/administrador/modificar_manifiesto/{id}', 'Manifiestos\ControllerManifiesto@seleccionarManifiesto');

//Ruta para modificar el manifiesto seleccionado
Route::post('/ajax/modificarManifiesto', 'Manifiestos\ControllerManifiesto@modificarManifiesto');

//Ajax Añadir manifiesto
Route::post('/ajax/anadirManifiesto', 'Manifiestos\ControllerManifiesto@anadirManifiesto');

//Ajax Eliminar manifiesto
Route::post('/ajax/eliminarManifiesto', 'Manifiestos\ControllerManifiesto@eliminarManifiesto');


/* -------------- */
/*  INFO-EVENTOS  */
/* -------------- */
//Ruta a la información del evento
Route::get('/{evento}', 'Eventos\ControllerEvento@RouteInfoEventos');

/* ---------------- */
/*  TABLA USUARIOS  */
/* ---------------- */
//Ruta para mostrar tabla con todos los usuarios de la bdd
Route::get('/administrador/tabla_usuarios',['as' => 'tabla_usuarios', 'uses' => 'Usuarios\ControllerUsuario@RouteTablaUsuarios'] );

//Ruta para mostrar datos de un usuario concreto seleccionado en la tabla
Route::get('/administrador/modificar_usuario/{id}', 'Usuarios\ControllerUsuario@modificarUsuario');

//Ruta para modificar el tipo de usuario
Route::post('/ajax/modificar_tipo_usuario', 'Usuarios\ControllerUsuario@modificarTipoUsuario');

//Ruta para la contraseña olvidada
Route::get('/acceder/contraseña_olvidada', ['as' => 'contraseña_olvidada', 'uses' => 'Usuarios\ControllerUsuario@contraseñaOlvidada']);

//Ruta para comprobar si existe el email y poder cambiar contraseña
Route::post('/acceder/buscar_email', 'Usuarios\ControllerUsuario@buscarEmail');

//Ruta para cambiar a nueva contraseña 
Route::post('/ajax/cambiarContraseña', 'Usuarios\ControllerUsuario@cambiarContraseña');

//Ruta para eliminar un usuario
Route::post('/administrador/eliminar_usuario/{id}', 'Usuarios\ControllerUsuario@eliminarUsuario');

//Ruta para modificar el perfil de los usuarios
Route::post('/mi_perfil/guardar_nuevos_datos', 'Usuarios\ControllerUsuario@GuardarNuevosDatosUsuario');

//Ruta para guardar la nueva contraseña del usuario que ha modificado el desde mi perfil
Route::post('/mi_perfil/guardar_nueva_contrasena', 'Usuarios\ControllerUsuario@GuardarNuevaContrasenaUsuario');

//Ruta para guardar la provincia y el municipio modificado por el usuario en mi perfil
Route::post('/mi_perfil/guardar_provincia_municipio', 'Usuarios\ControllerUsuario@GuardarProvinciaMunicipio');

//Ruta para eliminar usuario
Route::post('/mi_perfil/eliminar_usuario', 'Usuarios\ControllerUsuario@eliminarUsuarioPorUsuario');

/* ---------------- */
/*  PIE DE PAGINA  */
/* ---------------- */
//Ruta aviso legal
Route::get('/terminos_legales/aviso_legal', ['as' => 'aviso_legal', 'uses' => 'PagesController@RouteAvisoLegal']);

//Ruta politica de cookies
Route::get('/terminos_legales/politica_cookies', ['as' => 'politica_cookies', 'uses' => 'PagesController@RoutePoliticaCookies']);

//Ruta politica de privacidad
Route::get('/terminos_legales/politica_privacidad', ['as' => 'politica_privacidad', 'uses' => 'PagesController@RoutePoliticaPrivacidad']);