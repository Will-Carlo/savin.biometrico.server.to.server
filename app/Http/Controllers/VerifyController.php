<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RrhhPersonal;
use App\Models\RrhhAsistencia;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon; 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\ConnectionException;


class VerifyController extends Controller
{
    public function index(){    
        // $usersData = RrhhPersonal::select('id','finger')->get();

        // $usersData = RrhhPersonal::whereNotNull('finger')
        //     ->where('finger', '<>', '') // La columna no está vacía
        //     ->select('id', 'finger')
        //     ->get();


        $usersData = RrhhPersonal::whereNotNull('finger')
                                    ->where('finger', '<>', 'null') // No sea nula
                                    ->where('finger', '<>', '')    // No esté vacía
                                    ->select('id', 'finger')
                                    ->get();

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

        // $response = Http::post('http://localhost:8089/verify', ['userData' => $jsonUsersData]);
        $var = 'ip';
        $response = Http::timeout(120)->post('http://$var:8089/verify', ['userData' => $jsonUsersData]);

        // $response = Http::retry(2, 5,function($exception, $request){
        //     return $exception instanceof ConnectionException;
        // })->post('http://localhost:8089/verify', ['userData' => $jsonUsersData]);


        // try {
    
        //     if ($response->successful()) {
        //       dd('exito!');  // Manejar la respuesta exitosa;
        //     } else {
        //         $statusCode = $response->status();
        //         echo "La solicitud no fue exitosa. Código de estado: $statusCode";
        //     }
        // } catch (RequestException $exception) {
        //     // Manejar la excepción de tiempo de espera
        //     return view('errors.timeout-error');
        // }



        // dd(json_decode($response));
        $data = json_decode($response, true);
            // dd($data['idClient']);
        
        if ($response->successful() && $data['idClient'] != 0) {
            // dd(json_decode($response));

            // function showEmployee
            // return $this->showEmployee($response->body());
            // $userData = json_decode($data['userData'], true);

            $userID = $data['idClient'];
            // $timeSavin = $data['timeSavin'];
            $hora_marcada = Carbon::createFromFormat('H:i:s', $data['timeSavin']);

            // dd($userID);

            
            
            
            
            $RrhhAsistencia = new RrhhAsistencia;
            $RrhhAsistencia->id_turno = 1;
            $RrhhAsistencia->id_personal = $userID;
            $RrhhAsistencia->hora_marcado = $hora_marcada; 
            $RrhhAsistencia->minutos_atraso = $this->minutos_atraso($timeSavin); 
            $RrhhAsistencia->ind_tipo_movimiento = 1; 
            $RrhhAsistencia->save();
            
            $employee = RrhhPersonal::find($userID);
            
            // $employee = RrhhAsistencia::where('id_personal', $userID)->first();

            // dd($employee->personal->paterno);

            $paterno = $employee->paterno;
            $materno = $employee->materno;
            $nombres = $employee->nombres;
            // $fecha_marcada = $employee->hora_marcado;
            // $horaMarcada = Carbon::createFromFormat('Y-m-d H:i:s', $fecha_marcada)->format('H:i:s');


            $employeeData = [
                'fullName' => $paterno .' '. $materno .' '. $nombres,
                // 'time' => $horaMarcada
                'time' => $hora_marcada->format('H:i:s')

            ];

            // dd($employeeData['time']);
            // return redirect()->route('verify')->with("employee", $employee);
            return view('verify')->with('employeeData', $employeeData);
            

        } else {
            
            return view('/connection-error');

            $statusCode = $response->status();
            echo "La solicitud no fue exitosa. Código de estado: $statusCode";
        }



        //return redirect()->route('verify')->with('shipping-report', 'Datos enviados exitosamente');
        
    }
    
    function minutos_atraso($data)
    {
        // dd($data);
        // Hora de referencia '09:30:00'
        $horaReferencia = Carbon::createFromFormat('H:i:s', '09:30:00');

        // Convertir el tiempo de $data['timeSavin'] a formato Carbon
        $tiempoActual = Carbon::createFromFormat('H:i:s', $data);

        // Calcular los minutos excedentes si el tiempo actual es mayor que '09:30:00'
        if ($tiempoActual->greaterThan($horaReferencia)) {
            $minutosExcedentes = $tiempoActual->diffInMinutes($horaReferencia);
            return $minutosExcedentes;
        }

        return 0; // Si no hay excedentes, devuelve cero
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
        $employee = RrhhPersonal::find($data['idClient']);
        return redirect()->route('verify');
        
        // dd($employee->finger);
        // return view('verify');
        // dd($employee->toArray());
    }


    function show() {

        
        try {
            $response = Http::post('http://localhost:8089/macdir');

            if ($response->successful()) {
                // dd(json_decode($response));
                $data = json_decode($response, true);
                    
                // dd($data['macA']);
                
                $nombre = DB::table('rrhh_punto_asistencia')
                ->where('direccion_mac', $data['macA'])
                ->value('nombre');
    
                session(['storeName'=>$nombre]);
                
                // session()->forget('storeName');
                // dd(session()->all());
    
                return view('verify');
                // ->with('dataMac', session()->all());
            } else {
                $statusCode = $response->status();
                echo "La solicitud no fue exitosa. Código de estado: $statusCode";
            }
            //code...
        } catch (RequestException $exception) {
            //throw $th;
            
            throw $exception;
            return view('errors.connection-error');
        }


        // $dataMac = $this->verifyMacAddress();
    }

    public function verifyMacAddress() {
        
        
        $response = Http::post('http://localhost:8089/macdir');
        
        
        if ($response->successful()) {
            // dd(json_decode($response));
            $data = json_decode($response, true);
                
            return $data['macA'];
        } else {
            $statusCode = $response->status();
            echo "La solicitud no fue exitosa. Código de estado: $statusCode";
        }
        
    }


    function lastEmployee(Request $request){
        
    }
}
