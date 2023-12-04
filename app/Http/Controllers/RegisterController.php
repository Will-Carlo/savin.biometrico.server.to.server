<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\RrhhPersonal;
use Carbon\Carbon; 

class RegisterController extends Controller
{
    public function index(Request $request){

        $dateSavin = Carbon::now(); // Obtiene la fecha y hora actual
        $timeSavin = $dateSavin->format('H:i:s'); // Obtiene solo la hora en formato HH:MM:SS

        $userData = [
            'paterno' => $request->input('paterno'),
            'materno' => $request->input('materno'),
            'nombres' => $request->input('nombres'),
            'numero_documento' => $request->input('numero_documento'),
            'sigla' => $request->input('sigla'),
            'id_area' => $request->input('id_area'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'ind_genero' => $request->input('ind_genero'),
            'email' => $request->input('email'),
            'numero_celular' => $request->input('numero_celular'),
            'direccion' => $request->input('direccion'),
            'ruta_archivo' => $request->input('ruta_archivo'),
            'id_ciudad' => $request->input('id_ciudad'),

            // 'turno' => $request->input('turno'),
            // 'horaIngreso' => $timeSavin,
        ];

        $userDataJSON = json_encode($userData);
        $this->sendRegisterJson($userDataJSON);
        return redirect()->route('verify')->with('shipping-report', 'Datos enviados exitosamente');
    }
    
    
    function sendRegisterJson($userDataJSON) {
        
        
        $response = Http::post('http://localhost:8089/register', ['userData' => $userDataJSON]);
        // dd (json_decode($response));
        $this->saveData($response);
        
        if ($response->successful()) {
            $responseData = $response->json();
            //dd($responseData);
        } else {
            $statusCode = $response->status();
            echo "La solicitud no fue exitosa. Código de estado: $statusCode";
        }
        
    }
    
    function saveData($dataJson) {
        $data = json_decode($dataJson, true);
        $userData = json_decode($data['userData'], true);
        $userFinger = json_decode($data['finger'], true);

        // $finger = $data['finger'];

        //$userData = $dataJson['userData'];
        //$fingerData = $dataJson['finger'];

        $newUser = new RrhhPersonal;
        $newUser->paterno = $userData['paterno'];
        $newUser->materno = $userData['materno'];
        $newUser->nombres = $userData['nombres'];
        $newUser->numero_documento = $userData['numero_documento'];
        $newUser->sigla = $userData['sigla'];
        $newUser->id_area = $userData['id_area'];
        $newUser->fecha_nacimiento = $userData['fecha_nacimiento'];
        $newUser->ind_genero = $userData['ind_genero'];
        $newUser->email = $userData['email'];
        $newUser->numero_celular = $userData['numero_celular'];
        $newUser->direccion = $userData['direccion'];
        $newUser->ruta_archivo = $userData['ruta_archivo'];
        $newUser->id_ciudad = $userData['id_ciudad'];

        $newUser->finger = $userFinger['FingerData'];
        // $newUser->horaIngreso = $userData['horaIngreso'];
        $newUser->save();
    }



    function scheduleRegister(Request $request) {
        // $data = $request->all();

        //  dd($data);
        return view('/scheduleregister')->with('data', $request);
    }


    function show() {
        return view('register');
    }

}




// Route::post('/register', function (Request $request) {

//     // ventana emergente de la huella
//     // $fingerRec = redirect()->route('register_finger');
//     $newUser->finger = "";

//     return redirect()->route('verify')->with('shipping-report', 'Datos guardados exitosamente');
// })->name('register.save');
