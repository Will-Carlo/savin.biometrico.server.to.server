<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class VerifyController extends Controller
{
    public function index(Request $request){
        $usersData = User::select('id','finger')->get();
        $jsonUsersData = $usersData->toJson();
        // dd($jsonUsersData);
        $this->sendVerifyJson($jsonUsersData);
        
        
        //return redirect()->route('verify')->with('shipping-report', 'Datos enviados exitosamente');
    }
    
    
    function sendVerifyJson($userDataJSON) {
        
        
        $response = Http::post('http://localhost:8089/verify', ['userData' => $userDataJSON]);
        
        
        if ($response->successful()) {
            // dd(json_decode($response));
            $this->showEmployee($response);
        } else {
            $statusCode = $response->status();
            echo "La solicitud no fue exitosa. Código de estado: $statusCode";
        }
        
    }
    
    function showEmployee($dataJson) {
        $data = json_decode($dataJson, true);
        // $userID = json_decode($data['idClient'], true);
        // $userData = json_decode($data['userData'], true);
        // dd($data);
        $employee = User::find($data['idClient']);
        dd($employee->toArray());
    }
}
