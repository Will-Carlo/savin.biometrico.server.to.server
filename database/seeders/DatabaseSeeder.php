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

        \App\Models\InvSucursal::factory()->create();
        \App\Models\InvSucursal::factory()->create();
        \App\Models\InvSucursal::factory()->create();
        \App\Models\InvSucursal::factory()->create();
        \App\Models\InvAlmacen::factory()->create();
        \App\Models\InvAlmacen::factory()->create();
        \App\Models\InvAlmacen::factory()->create();
        \App\Models\InvAlmacen::factory()->create();


        \App\Models\RrhhPuntoAsistencia::factory()->create([
            
        ]);

        

    }
}
