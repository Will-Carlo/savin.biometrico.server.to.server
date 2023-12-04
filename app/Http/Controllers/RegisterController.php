<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Carbon\Carbon; 

class RegisterController extends Controller
{
    public function index(Request $request){

        $dateSavin = Carbon::now(); // Obtiene la fecha y hora actual
        $timeSavin = $dateSavin->format('H:i:s'); // Obtiene solo la hora en formato HH:MM:SS

        $userData = [
            'name' => $request->input('name'),
            'ci' => $request->input('ci'),
            'turno' => $request->input('turno'),
            'horaIngreso' => $timeSavin,
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

        $newUser = new User;
        $newUser->name = $userData['name'];
        $newUser->ci = $userData['ci'];
        $newUser->turno = $userData['turno'];
        $newUser->finger = $userFinger['FingerData'];
        $newUser->horaIngreso = $userData['horaIngreso'];
        $newUser->save();
    }



    function scheduleRegister(Request $request) {
        $data = $request->all();

        //  dd($data);
        return view('/scheduleregister')->with('data', $data);
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
