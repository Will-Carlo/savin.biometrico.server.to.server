<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    public function index(Request $request){
        // Obtiene los datos del formulario
        $userData = [
            'name' => $request->input('name'),
            'ci' => $request->input('ci'),
            'turno' => $request->input('turno'),
            'finger' => "",
            'macaddress' => "",
        ];

        // Convierte los datos a JSON
        $userDataJSON = json_encode($userData);
        // Llama a otra función y pasa el JSON como parámetro
        $this->sendRegisterJson($userDataJSON);
        //return redirect()->route('verify')->with('shipping-report', 'Datos enviados exitosamente');
    }


    function sendRegisterJson($userDataJSON) {

        
        // aquí enviamos y recibimos el json del otro servidor, una vez que se confirme el json se llevrá a la otra vista
        
        
        // Aquí puedes realizar la lógica necesaria para enviar el JSON a otra función o servidor
        // Por ejemplo, puedes utilizar la función Http::post() de Laravel para enviar el JSON a otra URL
        // Ejemplo:
        Http::post('http://192.168.1.148:8080/WaitingDataRegister', ['userData' => $userDataJSON]);
        dd (json_decode($userDataJSON));
        // En esta URL, debes manejar la recepción y procesamiento del JSON que estás enviando
        // Asegúrate de adaptar esta función a tus necesidades específicas y lógica de envío de datos.
        
    }
}
