<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrhh_asistencia', function (Blueprint $table) {
            $table->id();
            $table->integer('id_turno');
            $table->integer('id_personal');
            $table->time('hora_marcado');
            $table->integer('minutos_atraso');
            $table->integer('ind_tipo_movimiento');
            $table->binary('captura_imagen')->nullable(); // Campo BLOB
            $table->timestamps();

            // Claves foráneas
            // $table->foreign('id_turno')->references('id')->on('rrhh_turno'); // Reemplaza 'nombre_tabla_turno' por el nombre correcto de la tabla 'turno'
            // $table->foreign('id_personal')->references('id')->on('rrhh_personal'); // Reemplaza 'nombre_tabla_personal' por el nombre correcto de la tabla 'personal'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rrhh_asistencia');
    }
};
