<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

/*
|--------------------------------------------------------------------------
| RrhhTurno
|--------------------------------------------------------------------------
*/

        \App\Models\RrhhTurno::factory()->create([
            'nombre'=>'Completo Mañana',
            'hora_ingreso'=>'08:30:00',
            'hora_salida'=>'12:30:00',
        ]);
        \App\Models\RrhhTurno::factory()->create([
            'nombre'=>'Completo Tarde',
            'hora_ingreso'=>'12:30:00',
            'hora_salida'=>'19:00:00',
        ]);
        \App\Models\RrhhTurno::factory()->create([
            'nombre'=>'Completo Sábado',
            'hora_ingreso'=>'09:00:00',
            'hora_salida'=>'13:00:00',
        ]);
        \App\Models\RrhhTurno::factory()->create([
            'nombre'=>'Medio Tiempo Mañana',
            'hora_ingreso'=>'08:30:00',
            'hora_salida'=>'12:30:00',
        ]);
        \App\Models\RrhhTurno::factory()->create([
            'nombre'=>'Medio Tiempo Tarde',
            'hora_ingreso'=>'12:30:00',
            'hora_salida'=>'19:00:00',
        ]);

/*
|--------------------------------------------------------------------------
| InvSucursal
|--------------------------------------------------------------------------
*/

        \App\Models\InvSucursal::factory()->create();
        \App\Models\InvSucursal::factory()->create();
        \App\Models\InvSucursal::factory()->create();
        \App\Models\InvSucursal::factory()->create();

/*
|--------------------------------------------------------------------------
| InvAlmacen
|--------------------------------------------------------------------------
*/

        \App\Models\InvAlmacen::factory()->create();
        \App\Models\InvAlmacen::factory()->create();
        \App\Models\InvAlmacen::factory()->create();
        \App\Models\InvAlmacen::factory()->create();

/*
|--------------------------------------------------------------------------
| RrhhPuntoAsistencia
|--------------------------------------------------------------------------
*/

        \App\Models\RrhhPuntoAsistencia::factory()->create([
            'nombre'=>'ZAPATA',
            'direccion'=>'Calle Zapata No. 141 Piso PB Depto Local 2 Zona/Barrio San Jorge',
            'responsable'=>'Jhoni Velarde',
            'direccion_mac'=>'00-E0-4C-36-17-66',
            'id_sucursal'=>'1',
            'id_almacen'=>'1'          
        ]);

        \App\Models\RrhhPuntoAsistencia::factory()->create([
            'nombre'=>'LOAYZA',
            'direccion'=>'Calle Loayza No. 349 Edif.Loayza Piso PB, Local 3 Zona/Barrio Central',
            'responsable'=>'Ana Rojas',
            'direccion_mac'=>'00-E0-4C-36-17-61',
            'id_sucursal'=>'1',
            'id_almacen'=>'1'          
        ]);

        \App\Models\RrhhPuntoAsistencia::factory()->create([
            'nombre'=>'GOITIA',
            'direccion'=>'Calle Loayza No. 349 Edif. Loayza PB Local 1  Zona Central',
            'responsable'=>'Damian Calle',
            'direccion_mac'=>'00-E0-4C-36-17-66',
            'id_sucursal'=>'1',
            'id_almacen'=>'1'          
        ]);

/*
|--------------------------------------------------------------------------
| RrhhPersonal
|--------------------------------------------------------------------------
*/

        $datos = [
            [1, 'MOSCOSO', '', 'ERNESTO', '3352721', 'EM', 3, '1974-02-26', 13, 'serugirano60@hotmail.com', '12345670', 'Z. KUPINI', NULL, 1, ''],
            [2, 'CONDORI', 'VARGAS', 'LOURDES ', '4975520', 'LCV', 3, '1980-09-29', 14, 'jcsm00@hotmail.com', '12345670', 'Z. 16 DE JULIO', NULL, 1, ''],
            [3, 'CHINO', 'PILLCO', 'GUILLERMO', '6101028', 'MBPS', 3, '1983-03-26', 13, 'jcsm00@hotmail.com', '12345670', 'Z. VILLA COPACABANA', NULL, 1, ''],
            [4, 'PERALTA', 'Z', 'MAXIMO', '3441712', 'MP', 1, '1976-05-27', 14, 'jcsm00@hotmail.com', '12345670', 'Z. VILLA LA MERCED ', NULL, 1, 'null'],
            [6, 'VILLENA', 'BLANCO', 'ALDO YASMANI PEDRO', '14427565', 'AYPVB', 3, '1999-05-06', 13, 'jcsm00@hotmail.com', '12345670', 'Z. CALIRI', NULL, 1, ''],
            [7, 'OROZCO', 'CERDA', 'DAMIAN RENE', '2603153', 'DROC', 2, '1969-10-17', 13, 'jcsm00@hotmail.com', '12345670', 'Z. PAMPAHASI', NULL, 1, ''],
            [8, 'SANCHEZ', '', 'CARMIÑA', '', '', 3, NULL, NULL, 'jcsm00@hotmail.com', '12345670', '5169 NW 74 AVE', NULL, 1, 'null'],
            [9, 'CONDE ', 'SARCO', 'EUFRAIN SAMUEL', '4836922', 'ESCS', 9, '1979-03-28', 13, 'jcsm00@hotmail.com', '12345670', 'Z. 16 DE JULIO', NULL, 1, ''],
            [10, 'LIMA', 'FLORES', 'JUVENAL FLAVIA', '7056573', 'JFLF', 7, '1989-01-29', 14, 'jcsm00@hotmail.com', '12345670', 'Z. ZENKATA', NULL, 1, ''],
        ];

        foreach ($datos as $dato) {
            \App\Models\RrhhPersonal::factory()->create([
                'id' => $dato[0],
                'paterno' => $dato[1],
                'materno' => $dato[2],
                'nombres' => $dato[3],
                'numero_documento' => $dato[4],
                'sigla' => $dato[5],
                'id_area' => $dato[6],
                'fecha_nacimiento' => $dato[7],
                'ind_genero' => $dato[8],
                'email' => $dato[9],
                'numero_celular' => $dato[10],
                'direccion' => $dato[11],
                'ruta_archivo' => $dato[12],
                'id_ciudad' => $dato[13],
                'finger' => $dato[14], // Debes asignar el valor binario correspondiente aquí
            ]);
        }

        // \App\Models\RrhhPersonal::factory()->create([
        //     'id' => 1,
        //     'paterno' => 'MOSCOSO',
        //     'materno' => '',
        //     'nombres' => 'ERNESTO',
        //     'numero_documento' => '3352721',
        //     'sigla' => 'EM',
        //     'id_area' => 3,
        //     'fecha_nacimiento' => '1974-02-26',
        //     'ind_genero' => 13,
        //     'email' => 'serugirano60@hotmail.com',
        //     'numero_celular' => '12345670',
        //     'direccion' => 'Z. KUPINI',
        //     'ruta_archivo' => NULL,
        //     'id_ciudad' => 1,
        //     'finger' => null, // Debes asignar el valor binario correspondiente aquí
        // ]);

        // \App\Models\RrhhPersonal::factory()->create([
        //     'name'=>'Abdon',
        //     'finger'=>''
        // ]);

        // \App\Models\RrhhPersonal::factory()->create([
        //     'name'=>'Damian',
        //     'finger'=>''
        // ]);

        // \App\Models\RrhhPersonal::factory()->create([
        //     'name'=>'Rodri',
        //     'finger'=>''
        // ]);

/*
|--------------------------------------------------------------------------
| RrhhTurnoAsignado
|--------------------------------------------------------------------------
*/


        \App\Models\RrhhTurnoAsignado::factory()->create([
            'id_turno'=>'1',
            'id_personal'=>'1',
            'ind_tipo_marcado'=>'1',
            'ind_marcado_fijo_variable'=>'1',
            'id_punto_asistencia'=>'1',
        ]);

        \App\Models\RrhhTurnoAsignado::factory()->create([
            'id_turno'=>'2',
            'id_personal'=>'1',
            'ind_tipo_marcado'=>'1',
            'ind_marcado_fijo_variable'=>'1',
            'id_punto_asistencia'=>'1',
        ]);

        \App\Models\RrhhTurnoAsignado::factory()->create([
            'id_turno'=>'4',
            'id_personal'=>'4',
            'ind_tipo_marcado'=>'1',
            'ind_marcado_fijo_variable'=>'1',
            'id_punto_asistencia'=>'1',
        ]);

        \App\Models\RrhhTurnoAsignado::factory()->create([
            'id_turno'=>'2',
            'id_personal'=>'3',
            'ind_tipo_marcado'=>'1',
            'ind_marcado_fijo_variable'=>'1',
            'id_punto_asistencia'=>'2',
        ]);

/*
|--------------------------------------------------------------------------
| RrhhAsistencia
|--------------------------------------------------------------------------
*/

        \App\Models\RrhhAsistencia::factory()->create([
            'id_turno'=>'1',
            'id_personal'=>'1',
            'hora_marcado'=>'2023-12-03 08:31:37',
            'minutos_atraso'=>'1',
            'ind_tipo_movimiento'=>'1',
        ]);

        \App\Models\RrhhAsistencia::factory()->create([
            'id_turno'=>'2',
            'id_personal'=>'1',
            'hora_marcado'=>'2023-12-03 12:38:37',
            'minutos_atraso'=>'8',
            'ind_tipo_movimiento'=>'1',
        ]);
    }
}
