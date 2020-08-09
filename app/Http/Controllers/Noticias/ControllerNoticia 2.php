<?php

namespace App\Http\Controllers\Noticias;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Models\Noticias\ModelNoticia;

class ControllerNoticia extends Controller
{
	public function RouteTablaNoticias()
	{
        $noticias = ModelNoticia::all();
        return view('Noticias/tabla_noticias', ['noticias' => $noticias]);
    }

	public function RouteNuevaNoticia()
	{
		return view('Noticias/añadir_noticia');
	}

	public function RouteEliminarNoticia()
	{
		$noticias = ModelNoticia::all();
        return view('Noticias/eliminar_noticia', ['noticias' => $noticias]);
	}

	public function seleccionarNoticia($id)
	{
		$noticia = ModelNoticia::where('id', $id)->first();
        return view('Noticias/modificar_noticia', ['noticia' => $noticia]);
	}

	public function anadirNoticia(Request $request)
	{
		$devuelve['ok'] = 0;
		//Si ningun input esta vacio
		if(trim($request->input('titulo_noticia')) != '' && trim($request->input('enlace_noticia')) != '')
        {   
            $noticia_bdd = ModelNoticia::where('titulo', $request->input('titulo_noticia'))->get();
            if($noticia_bdd->count()==0)
            {
            	//Guardamos en la bdd el noticia
            	$nueva_noticia = new ModelNoticia();
                $nueva_noticia->titulo=$request->input('titulo_noticia');
                $nueva_noticia->enlace=$request->input('enlace_noticia');
                if ($request->hasFile('file')) //Si recibimos el file que es de la imagen
    		    {
    		      $file = $request->file('file');
    		      $nombre = $file->getClientOriginalName();
    		      $nueva_noticia->imagen=$file->getClientOriginalName();
    		      $path = public_path('imagenes/Noticias/');
    		      $file->move($path, $nombre);
    		    }
                
                $nueva_noticia->save(); //guardamos en la base de datos
                $devuelve['ok'] = 1; //Devuelve 1 cuando no hay ningun input vacio y se guarda en la bdd
            }
            else
            {
                $devuelve['ok'] = 2;
            }
        }
	    return $devuelve;
	}

	public function eliminarNoticia(Request $request)
    {
        $devuelve['ok'] = 0;

        if(trim($request->input('id_noticia')) != ''){
            $noticia_a_eliminar = ModelNoticia::where('id', $request->input('id_noticia'))->delete();
            $devuelve['ok'] = 1;
        }
        return $devuelve;
    }

	public function modificarNoticia(Request $request)
	{
		$devuelve['ok'] = 0;
        //Si ningun input esta vacio
        if(trim($request->input('titulo_noticia')) != '' && trim($request->input('enlace_noticia')) != '' && trim($request->input('id_noticia')) != '' && trim($request->input('fecha_noticia')) != '')
        {
            //Modificamos en la base de datos
            $modificar_noticia = ModelNoticia::find($request->input('id_noticia'));
            $modificar_noticia->titulo=$request->input('titulo_noticia');
            $modificar_noticia->enlace=$request->input('enlace_noticia');
            $modificar_noticia->fecha=$request->input('fecha_noticia');

            if ($request->hasFile('file')) //Si recibimos el file que es de la imagen
            {
                $file = $request->file('file');
                $nombre = $file->getClientOriginalName();
                $modificar_noticia->imagen=$file->getClientOriginalName();
                $path = public_path('imagenes/Noticias/');
                $file->move($path, $nombre);
            }

            $modificar_noticia->save();
            $devuelve['ok'] = 1; //Devuelve 1 cuando guarda en la bdd
        }
        return $devuelve;
	}
}
