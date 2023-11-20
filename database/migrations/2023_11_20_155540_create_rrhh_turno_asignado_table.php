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
        Schema::create('rrhh_turno_asignado', function (Blueprint $table) {
            $table->id();
            $table->integer('id_turno');
            $table->integer('id_personal');
            $table->integer('ind_tipo_marcado');
            $table->integer('ind_marcado_fijo_variable');
            $table->integer('id_punto_asistencia')->nullable();
            $table->timestamps();

            // Claves foráneas
            // $table->foreign('id_turno')->references('id')->on('rrhh_turno');
            // $table->foreign('id_personal')->references('id')->on('rrhh_personal'); 
            // $table->foreign('id_punto_asistencia')->references('id')->on('rrhh_punto_asistencia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rrhh_turno_asignado');
    }
};
