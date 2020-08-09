<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Models\Usuarios\ModelUsuario;

use App\Http\Models\Provincias\ModelProvincia;

use App\Http\Models\Municipios\ModelMunicipio;

class ControllerUsuario extends Controller
{

    public function eliminarUsuarioPorUsuario(Request $request)
    {
        session_unset(); //quitamos la sesion del usuario
        ModelUsuario::where('id', $request->input('id_usuario'))->delete(); //eliminamos usuario
        return redirect('acceder'); //enviamos a vista registrarse
    }

    public function GuardarProvinciaMunicipio(Request $request)
    {
        if(trim($request->input('id_usuario')) != '' && trim($request->input('provincia')) != '' && trim($request->input('municipio')) != '')
        {
            $modificar_contraseña = ModelUsuario::find($request->input('id_usuario'));
            $modificar_contraseña->provincia=$request->input('provincia');
            $modificar_contraseña->municipio=$request->input('municipios');
            $modificar_contraseña->save();

            $todas_provincias = ModelProvincia::all();
            $usuario = ModelUsuario::where('id', $request->input('id_usuario'))->first();
            $provincia = ModelProvincia::where('id', $usuario->provincia)->get();
            $municipio = ModelMunicipio::where('id', $usuario->municipio)->where('provincia_id', $usuario->provincia)->get();
            return view('Usuarios/perfil_usuario', [
                                                'usuario' => $usuario,
                                                'provincia' => $provincia,
                                                'municipio' => $municipio,
                                                'todas_provincias' => $todas_provincias
                                                ]);
        } 
        else
        {
            return view('error');
        }
    }

    public function GuardarNuevosDatosUsuario(Request $request)
    {
        if(trim($request->input('id_usuario')) != '' && trim($request->input('nick')) != '' &&
            trim($request->input('nombre_completo')) != '' && trim($request->input('email')) != '' &&
            trim($request->input('fecha_nacimiento')) != '' && trim($request->input('sexo')) != '')
        {
            $modificar_contraseña = ModelUsuario::find($request->input('id_usuario'));
            $modificar_contraseña->nick=$request->input('nick');
            $modificar_contraseña->nombre_completo=$request->input('nombre_completo');
            $modificar_contraseña->email=$request->input('email');
            $modificar_contraseña->fecha_nacimiento=$request->input('fecha_nacimiento');
            $modificar_contraseña->sexo=$request->input('sexo');
            $modificar_contraseña->save();

            $todas_provincias = ModelProvincia::all();
            $usuario = ModelUsuario::where('id', $request->input('id_usuario'))->first();
            $provincia = ModelProvincia::where('id', $usuario->provincia)->get();
            $municipio = ModelMunicipio::where('id', $usuario->municipio)->where('provincia_id', $usuario->provincia)->get();
            return view('Usuarios/perfil_usuario', [
                                                    'usuario' => $usuario,
                                                    'provincia' => $provincia,
                                                    'municipio' => $municipio,
                                                    'todas_provincias' => $todas_provincias
                                                    ]);

        }
        else
        {
            return view('error');
        }
    }

    public function GuardarNuevaContrasenaUsuario(Request $request)
    {
        if(trim($request->input('id_usuario')) != '' && trim($request->input('password')) != '')
        {
            $modificar_contraseña = ModelUsuario::find($request->input('id_usuario'));
            $modificar_contraseña->password=$request->input('password');
            
            $modificar_contraseña->save();

            $todas_provincias = ModelProvincia::all();
            $usuario = ModelUsuario::where('id', $request->input('id_usuario'))->first();
            $provincia = ModelProvincia::where('id', $usuario->provincia)->get();
            $municipio = ModelMunicipio::where('id', $usuario->municipio)->where('provincia_id', $usuario->provincia)->get();
            return view('Usuarios/perfil_usuario', [
                                                'usuario' => $usuario,
                                                'provincia' => $provincia,
                                                'municipio' => $municipio,
                                                'todas_provincias' => $todas_provincias
                                                ]);
        } 
        else
        {
            return view('error');
        }
    }

    public function RouteMiPerfil($nick)
    {
        $todas_provincias = ModelProvincia::all();
        $usuario = ModelUsuario::where('nick', $nick)->first(); 
        $provincia = ModelProvincia::where('id', $usuario->provincia)->get();
        $municipio = ModelMunicipio::where('id', $usuario->municipio)->where('provincia_id', $usuario->provincia)->get();
        return view('Usuarios/perfil_usuario', [
                                                'usuario' => $usuario,
                                                'provincia' => $provincia,
                                                'municipio' => $municipio,
                                                'todas_provincias' => $todas_provincias
                                                ]);
    }

    public function RouteAcceder()
    {
    	$usuarios = ModelUsuario::all();
		return view('acceder', ['usuarios' => $usuarios]);
    }

    public function RouteRegistrarse()
    {
    	$provincias = ModelProvincia::all();
    	return view('registrarse', ['provincias' => $provincias]);
    }

    public function Provincia(Request $request)
    {
        $devuelve = 0;
        if(trim($request->input('provincia') != ''))
        {
            $municipios = ModelMunicipio::where('provincia_id' , $request->input('provincia'))->get();
            $devuelve = $municipios;
        }
    	return $devuelve;
    }

    public function Acceder(Request $request)
    {
    	$devuelve['ok']=0; //Devuelve 0 si la contraseña no es valida
    	//AQUI COMPROBAMOS DATOS INTRODUCIDOS EN ACCEDER
    	if (trim($request->input('nick')) != '' && trim($request->input('pass')) != '')
		{
			$usuario = ModelUsuario::Where('nick',$request->input('nick'))->Where('password',$request->input('pass'))->get();
            $nick_usuario = ModelUsuario::Where('nick',$request->input('nick'))->get();
			if ($nick_usuario->count()>0) //comprobamos si existe el nick del usuario
			{
                if($usuario->count()>0)//comprobamos el usuario entero
                {
                    $devuelve['ok']=1;
                    $_SESSION['nick_usuario'] = $request->input('nick');
                    $_SESSION['tipo_usuario'] = $usuario[0]['tipo'];
                } 
            }
            else
            {
               $devuelve['ok'] = 2; 
            }
        }
		return $devuelve;
    }

    public function Desconectar()
	{
    	session_destroy();
    	return redirect('/');
    }

    public function Registrarse(Request $request){
        $devuelve['ok']=0;
        if(trim($request->input('nick')) != '' && trim($request->input('nombre_apellidos')) != ''&& trim($request->input('email')) != '' && trim($request->input('pass')) != "" && trim($request->input('pass2')) != '' && trim($request->input('provincia')) != '' && trim($request->input('municipios')) != '' && trim($request->input('fechaNaci')) != '')
        {
            if($request->input('pass') == $request->input('pass2'))
            {
                $existe_email = ModelUsuario::Where('email', $request->input('email'))->first();
                if(!$existe_email['email'])
                {  
                    $nuevo_usuario = new ModelUsuario();
                    $nuevo_usuario->nick=$request->input('nick');
                    $nuevo_usuario->nombre_completo=$request->input('nombre_apellidos');
                    $nuevo_usuario->email=$request->input('email');
                    $nuevo_usuario->password=$request->input('pass');
                    $nuevo_usuario->provincia=$request->input('provincia');
                    $nuevo_usuario->municipio=$request->input('municipios');
                    $nuevo_usuario->fecha_nacimiento=$request->input('fechaNaci');
                    $nuevo_usuario->tipo='Estandar';
                    $nuevo_usuario->save(); //guardamos en la base de datos
                    $devuelve['ok'] = 1; //Devuelve que no existe en la bdd y se puede registrar

                    //creamos la session del Registro
                    $_SESSION['nick_usuario'] = $request->input('nick');
                    $_SESSION['tipo_usuario'] = 'Estandar';
                }
                else
                {
                    $devuelve['ok'] = 0; //Existe el email y error
                }
            }
            else
            {
                $devuelve['ok'] = 2; //Error
            }        
        }
        else
        {
            $devuelve['ok'] = 2; //Error
        }
        return $devuelve; 
    }

    public function RouteTablaUsuarios()
    {
        $usuarios = ModelUsuario::all();
        return view('Usuarios/tabla_usuarios', ['usuarios' => $usuarios]);
    }

    public function modificarUsuario($id)
    {
        $usuario = ModelUsuario::where('id', $id)->first(); 
        $provincia = ModelProvincia::where('id', $usuario->provincia)->get();
        $municipio = ModelMunicipio::where('id', $usuario->municipio)->where('provincia_id', $usuario->provincia)->get();
        return view('Usuarios/form_modif_usu', [
                                                'usuario' => $usuario,
                                                'provincia' => $provincia,
                                                'municipio' => $municipio
                                               ]);
    }

    public function modificarTipoUsuario(Request $request)
    {
        $devuelve['ok'] = 0;

        if(trim($request->input('id_usuario')) != '' && trim($request->input('tipo_usuario')) != '')
        {
            //Modificamos en la base de datos
            $modificar_tipo_usuario = ModelUsuario::find($request->input('id_usuario'));
            $modificar_tipo_usuario->tipo=$request->input('tipo_usuario');
            $modificar_tipo_usuario->fecha_nacimiento=$request->input('fecha_nacimiento');
            $modificar_tipo_usuario->save();
            $devuelve['ok'] = 1; //Devuelve 1 cuando guarda en la bdd
        }
        return $devuelve;
    }

    public function contraseñaOlvidada(){
        return view('cambiar_contrasena');
    }

    public function buscarEmail(Request $request){
        $email = ModelUsuario::where('email', $request->input('email'))->get();
        if($email->count()!=0)
        {
            return view('nueva_contrasena', ['email' => $email]);
        }

        return view('cambiar_contrasena', ['mensaje' => 'No existe el email del usuario, crea un nuevo usuario.']);
    }

    public function cambiarContraseña(Request $request)
    {
        if(trim($request->input('id_usuario')) != '' && trim($request->input('contraseña')) != '' && trim($request->input('contraseña2')) != '')
        {
            //Modificamos en la base de datos
            $modificar_contraseña = ModelUsuario::find($request->input('id_usuario'));
            $modificar_contraseña->password=$request->input('contraseña');
            $modificar_contraseña->save();
            $devuelve['ok'] = 1; //Devuelve 1 cuando guarda en la bdd
        }
        return $devuelve;
    }

    public function eliminarUsuario(Request $request, $id)
    {
       ModelUsuario::where('id', $id)->delete();
       return redirect('/administrador/tabla_usuarios');
    }
}

