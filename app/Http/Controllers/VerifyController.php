<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon; 

class VerifyController extends Controller
{
    public function index(){
        $usersData = User::select('id','finger')->get();
        // $timeSavin = Carbon::now()->toDateTimeString();
        
        
        $dateSavin = Carbon::now(); // Obtiene la fecha y hora actual
        $timeSavin = $dateSavin->format('H:i:s'); // Obtiene solo la hora en formato HH:MM:SS
        $dataSend = [
            'usersData' => $usersData,
            'timeSavin' => $timeSavin
        ];
        
         //dd($dataSend);
         $jsonUsersData = json_encode($dataSend);
       // $jsonUsersData = $usersData->toJson();
        // dd($jsonUsersData);
        
        //$this->sendVerifyJson($jsonUsersData);
        //  function sendVerifyJson

        $response = Http::post('http://localhost:8089/verify', ['userData' => $jsonUsersData]);
        // dd(json_decode($response));
        
        if ($response->successful()) {
            // dd(json_decode($response));

            // function showEmployee
            // return $this->showEmployee($response->body());
            $data = json_decode($response, true);
            // $userID = json_decode($data['idClient'], true);
            // $userData = json_decode($data['userData'], true);
           //  $timeSavin = $data['timeSavin'];
            
            
            $employee = User::find($data['idClient']);

            $employee->horaIngreso = $data['timeSavin'];
            $employee->save();

            // dd($employee ->name);
            // return redirect()->route('verify')->with("employee", $employee);
            return view('verify')->with('employee', $employee);
            

        } else {
            $statusCode = $response->status();
            echo "La solicitud no fue exitosa. Código de estado: $statusCode";
        }



        //return redirect()->route('verify')->with('shipping-report', 'Datos enviados exitosamente');
        
    }
    
    
    public function sendVerifyJson($userDataJSON) {
        
        
        $response = Http::post('http://localhost:8089/verify', ['userData' => $userDataJSON]);
        
        
        if ($response->successful()) {
            // dd(json_decode($response));
            return $this->showEmployee($response->body());
        } else {
            $statusCode = $response->status();
            echo "La solicitud no fue exitosa. Código de estado: $statusCode";
        }
        
    }
    
    public function showEmployee($dataJson) {
        $data = json_decode($dataJson, true);
        // $userID = json_decode($data['idClient'], true);
        // $userData = json_decode($data['userData'], true);
        $employee = User::find($data['idClient']);
        return redirect()->route('verify');
        
        // dd($employee->finger);
        // return view('verify');
        // dd($employee->toArray());
    }


    function show() {
        return view('verify');
    }


    function lastEmployee(Request $request){
        
    }
}
