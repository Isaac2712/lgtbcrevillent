<?php

namespace App\Http\Controllers\Eventos;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Models\Eventos\ModelEvento;

class ControllerEvento extends Controller
{

    public function RouteInfoEventos($titulo_evento)
    {
        $info_evento = ModelEvento::where('titulo', $titulo_evento)->get();
        return view('Eventos/info_eventos', ['info_evento' => $info_evento]);
    }

    public function RouteEliminarEvento()
    {
        $eventos = ModelEvento::all();
        return view('Eventos/eliminar_evento', ['eventos' => $eventos]);
    }

    public function RouteTablaEventos()
    {
        $eventos = ModelEvento::all();
        return view('Eventos/tabla_eventos', ['eventos' => $eventos]);
    }

    public function RouteNuevoEvento()
    {
        return view('Eventos/anadir_evento');
    }

	public function anadirEvento(Request $request)
	{
		$devuelve['ok'] = 0;
		//Si ningun input esta vacio
		if(trim($request->input('titulo_evento')) != '' && trim($request->input('localidad_evento')) != ''&& trim($request->input('texto_evento')) != '' && trim($request->input('lugar_evento')) != "" && trim($request->input('direccion_evento')) != '' && trim($request->input('telefono_evento')) != '' && trim($request->input('horario_evento')) != '' && trim($request->input('fecha_evento')) != '' && trim($request->input('select_tipo_evento')) != '')
        {   
            //Comprobamos que el titulo que añaidmos nuevo sea distinto a otros titulos de la bdd
            $evento_bdd = ModelEvento::where('titulo', $request->input('titulo_evento'))->get();
            if($evento_bdd->count()==0) //Si el array es igual a 0, no hay titulos y se añade nuevo evento
            {
            	//Guardamos en la bdd el evento
            	$nuevo_evento = new ModelEvento();
                $nuevo_evento->titulo=$request->input('titulo_evento');
                $nuevo_evento->localidad=$request->input('localidad_evento');
                $nuevo_evento->texto=$request->input('texto_evento');
                $nuevo_evento->lugar=$request->input('lugar_evento');
                $nuevo_evento->direccion=$request->input('direccion_evento');
                $nuevo_evento->telefono=$request->input('telefono_evento');
                $nuevo_evento->horario=$request->input('horario_evento');
                $nuevo_evento->fecha=$request->input('fecha_evento');
                $nuevo_evento->tipo=$request->input('select_tipo_evento'); //nuevo 23-9-19
                if ($request->hasFile('file')) //Si recibimos el file que es de la imagen
    		    {
    		      $file = $request->file('file');
    		      $nombre = $file->getClientOriginalName();
    		      $nuevo_evento->imagen=$file->getClientOriginalName();
    		      $path = public_path('imagenes/Eventos/');
    		      $file->move($path, $nombre);
    		    }
                
                $nuevo_evento->save(); //guardamos en la base de datos
                $devuelve['ok'] = 1; //Devuelve 1 cuando no hay ningun input vacio y se guarda en la bdd
            } //Fin comprobar si ya esta en la bdd
            else
            {
                $devuelve['ok'] = 2;
            }
        }
	    return $devuelve;
	}

    public function eliminarEvento(Request $request)
    {
        $devuelve['ok'] = 0;

        if(trim($request->input('titulo_evento')) != ''){
            $evento_a_eliminar = ModelEvento::where('titulo', $request->input('titulo_evento'))->delete();
            $devuelve['ok'] = 1;
        }
        return $devuelve;
    }

    public function seleccionarEvento($id)
    {
        $evento = ModelEvento::where('id', $id)->first();
        return view('Eventos/modificar_evento', ['evento' => $evento]);
    }

    public function modificarEvento(Request $request)
    {
        $devuelve['ok'] = 0;
        //Si ningun input esta vacio
        if(trim($request->input('titulo_evento')) != '' && trim($request->input('localidad_evento')) != ''&& trim($request->input('texto_evento')) != '' && trim($request->input('lugar_evento')) != "" && trim($request->input('direccion_evento')) != '' && trim($request->input('telefono_evento')) != '' && trim($request->input('horario_evento')) != '' && trim($request->input('fecha_evento')) != '' && trim($request->input('id_evento')) != '')
        {
            $modificar_evento = ModelEvento::find($request->input('id_evento'));
            $modificar_evento->titulo=$request->input('titulo_evento');
            $modificar_evento->localidad=$request->input('localidad_evento');
            $modificar_evento->texto=$request->input('texto_evento');
            $modificar_evento->lugar=$request->input('lugar_evento');
            $modificar_evento->direccion=$request->input('direccion_evento');
            $modificar_evento->telefono=$request->input('telefono_evento');
            $modificar_evento->horario=$request->input('horario_evento');
            $modificar_evento->fecha=$request->input('fecha_evento');
            if ($request->hasFile('file')) //Si recibimos el file que es de la imagen
            {
                $file = $request->file('file');
                $nombre = $file->getClientOriginalName();
                $modificar_evento->imagen=$file->getClientOriginalName();
                $path = public_path('imagenes/Eventos/');
                $file->move($path, $nombre);
            }
            
            $modificar_evento->save();
            $devuelve['ok'] = 1;
        }
        return $devuelve;
    }
}
