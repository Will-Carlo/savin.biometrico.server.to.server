<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(Request $request){

        $userData = [
            'name' => $request->input('name'),
            'ci' => $request->input('ci'),
            'turno' => $request->input('turno'),
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
        // $finger = $data['finger'];

        //$userData = $dataJson['userData'];
        //$fingerData = $dataJson['finger'];

        $newUser = new User;
        $newUser->name = $userData['name'];
        $newUser->ci = $userData['ci'];
        $newUser->turno = $userData['turno'];
        $newUser->finger = $data['finger'];
        $newUser->save();
    }
}

// Route::post('/register', function (Request $request) {

//     // ventana emergente de la huella
//     // $fingerRec = redirect()->route('register_finger');
//     $newUser->finger = "";

//     return redirect()->route('verify')->with('shipping-report', 'Datos guardados exitosamente');
// })->name('register.save');
