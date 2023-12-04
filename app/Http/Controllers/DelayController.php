<?php

namespace App\Http\Controllers;


use App\Models\RrhhPersonal;
use App\Models\RrhhAsistencia;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class DelayController extends Controller
{
    public function index(){
        $usersData = RrhhPersonal::select('id','finger')->get();
        
        $dateSavin = Carbon::now(); // Obtiene la fecha y hora actual
        $timeSavin = $dateSavin->format('H:i:s'); // Obtiene solo la hora en formato HH:MM:SS
        $dataSend = [
            'usersData' => $usersData,
            'timeSavin' => $timeSavin
        ];
        
        $jsonUsersData = json_encode($dataSend);

        $response = Http::post('http://localhost:8089/verify', ['userData' => $jsonUsersData]);
        
        if ($response->successful()) {
            $data = json_decode($response, true);
            $mesActual = Carbon::now()->month;
            $suma = DB::table('rrhh_asistencia')
                        ->where('id_turno', $data['idClient']) // ID específico que estás buscando
                        ->whereMonth('hora_marcado', $mesActual) // Filtrar por el mes actual
                        ->sum('minutos_atraso');
            $employee = RrhhPersonal::find($data['idClient']);
            $name = $employee->paterno . ' ' . $employee->materno . ' ' . $employee->nombres;


            $dataSend = [
                'delayTotal' => $suma,
                'employee' => $name
            ];

            dd($dataSend);
            return view('delay')->with('dataSend', $dataSend);
            

        } else {
            $statusCode = $response->status();
            echo "La solicitud no fue exitosa. Código de estado: $statusCode";
        }
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
        $employee = RrhhAsistencia::find($data['idClient']);
        return redirect()->route('verify');
        
        // dd($employee->finger);
        // return view('verify');
        // dd($employee->toArray());
    }


    function show() {
        return view('delay');
    }


    function lastEmployee(Request $request){
        
    }
}
