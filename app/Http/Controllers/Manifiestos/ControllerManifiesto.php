<?php

namespace App\Http\Controllers\Manifiestos;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Models\Manifiestos\ModelManifiesto;

class ControllerManifiesto extends Controller
{
	public function RouteManifiestos()
	{
        /*Mostramos 50 manifiestos*/
        $manifiestos = ModelManifiesto::take(50)->get();
        return view('Manifiestos/manifiestos', ['manifiestos' => $manifiestos]);
    }

	public function GenerarPDF($titulo_manifiesto)
	{
		$manifiesto = ModelManifiesto::where('titulo', $titulo_manifiesto)->get();
		$pdf = \PDF::loadView('Manifiestos/manifiesto_pdf', ['manifiesto' => $manifiesto]);
		return $pdf->stream();
	}

	public function RouteTablaManifiestos()
	{
        $manifiestos = ModelManifiesto::all();
        return view('Manifiestos/tabla_manifiesto', ['manifiestos' => $manifiestos]);
    }

	public function RouteNuevoManifiesto()
	{
		return view('Manifiestos/añadir_manifiesto');
	}

	public function RouteEliminarManifiesto()
	{
		$manifiestos = ModelManifiesto::all();
        return view('Manifiestos/eliminar_manifiesto', ['manifiestos' => $manifiestos]);
	}

	public function seleccionarManifiesto($id)
	{
		$manifiesto = ModelManifiesto::where('id', $id)->first();
        return view('Manifiestos/modificar_manifiesto', ['manifiesto' => $manifiesto]);
	}

	public function anadirManifiesto(Request $request)
	{
		$devuelve['ok'] = 0;
		//Si ningun input esta vacio
		if(trim($request->input('titulo_manifiesto')) != '' && trim($request->input('texto_manifiesto')) != '' && trim($request->input('fecha_manifiesto')) != '')
        {   
            $manifiesto_bdd = ModelManifiesto::where('titulo', $request->input('titulo_manifiesto'))->get();
            if($manifiesto_bdd->count()==0)
            {
            	//Guardamos en la bdd el manifiesto
            	$nuevo_manifiesto = new ModelManifiesto();
                $nuevo_manifiesto->titulo=$request->input('titulo_manifiesto');
                $nuevo_manifiesto->fecha=$request->input('fecha_manifiesto');
                $nuevo_manifiesto->texto=$request->input('texto_manifiesto');
                if ($request->hasFile('file')) //Si recibimos el file que es de la imagen
    		    {
    		      $file = $request->file('file');
    		      $nombre = $file->getClientOriginalName();
    		      $nuevo_manifiesto->imagen=$file->getClientOriginalName();
    		      $path = public_path('PDF/Manifiestos/');
    		      $file->move($path, $nombre);
    		    }
                
                $nuevo_manifiesto->save(); //guardamos en la base de datos
                $devuelve['ok'] = 1; //Devuelve 1 cuando no hay ningun input vacio y se guarda en la bdd
            }
            else
            {
                $devuelve['ok'] = 2;
            }
        }
	    return $devuelve;
	}

	public function eliminarManifiesto(Request $request)
    {
        $devuelve['ok'] = 0;

        if(trim($request->input('id_manifiesto')) != ''){
            $manifiesto_a_eliminar = ModelManifiesto::where('id', $request->input('id_manifiesto'))->delete();
            $devuelve['ok'] = 1;
        }
        return $devuelve;
    }

	public function modificarManifiesto(Request $request)
	{
		$devuelve['ok'] = 0;
        //Si ningun input esta vacio
        if(trim($request->input('titulo_manifiesto')) != '' && trim($request->input('texto_manifiesto')) != '' && trim($request->input('id_manifiesto')) != '' && trim($request->input('fecha_manifiesto')) != '')
        {
            //Modificamos en la base de datos
            $modificar_manifiesto = ModelManifiesto::find($request->input('id_manifiesto'));
            $modificar_manifiesto->titulo=$request->input('titulo_manifiesto');
            $modificar_manifiesto->texto=$request->input('texto_manifiesto');
            $modificar_manifiesto->fecha=$request->input('fecha_manifiesto');

            if ($request->hasFile('file')) //Si recibimos el file que es de la imagen
            {
                $file = $request->file('file');
                $nombre = $file->getClientOriginalName();
                $modificar_manifiesto->imagen=$file->getClientOriginalName();
                $path = public_path('PDF/Manifiestos/');
                $file->move($path, $nombre);
            }

            $modificar_manifiesto->save();
            $devuelve['ok'] = 1; //Devuelve 1 cuando guarda en la bdd
        }
        return $devuelve;
	}
}