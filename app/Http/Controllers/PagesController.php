<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Eventos

use App\Http\Controllers\Eventos;

use App\Http\Models\Eventos\ModelEvento;

//Noticias

use App\Http\Controllers\Noticias;

use App\Http\Models\Noticias\ModelNoticia;

//Manifiestos

use App\Http\Controllers\Manifiestos;

use App\Http\Models\Manifiestos\ModelManifiesto;

class PagesController extends Controller
{
    public function RouteHome(){
        /*
        Esta funcion manda los eventos y noticias a la pagina home (que es la principal)
        Solo se mandaran los 12 primeros eventos y las 12 primeras noticias para que la página no tenga tantos eventos y tantas noticias
        */
        $eventos = ModelEvento::take(12)->get();
        $noticias = ModelNoticia::take(12)->get();
        return view('home', ['eventos' => $eventos,
                             'noticias' => $noticias
                            ]);
    }

    public function RouteContacto(){
    	return view('contacto');
    }

    public function RouteQuienesSomos(){
        return view('quienes_somos');
    }

    public function RouteError(){
        return view('error'); //Uso cuando no queremos que un usuario acceda ahí
    }

    public function RouteAdministrador(){
        return view('main_admin');
    }

    public function RouteEnviarMensaje(Request $request){
        if(trim($request->input('nombre')) != '' && trim($request->input('apellidos')) != '' && trim($request->input('email')) != '' && trim($request->input('mensaje')) != '' )
        {
            $from = $request->input('email');
            $to = "isaac.marroc@gmail.com";
            $subject = "Mensaje de ".$request->input('nombre');
            $message = $request->input('mensaje');
            $headers = "From:" . $from;
            mail($to,$subject,$message, $headers);
        }
        return view('contacto');
    }

    public function RouteAvisoLegal(){
        return view('Terminos legales/aviso_legal');
    }

    public function RoutePoliticaCookies(){
        return view('Terminos legales/politica_cookies');
    }

    public function RoutePoliticaPrivacidad(){
        return view('Terminos legales/politica_privacidad');
    }
}
