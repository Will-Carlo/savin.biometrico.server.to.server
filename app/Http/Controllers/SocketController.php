<?php

namespace App\Http\Controllers;

use App\Events\testWebsocket;
use Illuminate\Http\Request;

class SocketController extends Controller
{
    //

    public function test(){
        // $datos = [
        //     'dato1' => 'hello world'
        // ];
        // // // event(new testWebsocket($datos));
        // event(new testWebsocket());
    }

    public function enviarEvento(Request $request){
       // Recibe los datos del cliente (JSON)
       $datos = $request->all(); // Puedes ajustar cómo recibes los datos según tu implementación

       // Emite el evento a través de WebSockets
       event(new testWebsocket($datos));

       return response()->json(['mensaje' => 'Evento de encendido enviado correctamente']);
     }
}
