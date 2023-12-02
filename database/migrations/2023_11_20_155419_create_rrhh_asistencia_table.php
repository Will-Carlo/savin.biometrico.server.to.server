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
            $table->unsignedBigInteger('id_turno');
            $table->unsignedBigInteger('id_personal');
            $table->time('hora_marcado');
            $table->integer('minutos_atraso');
            $table->integer('ind_tipo_movimiento');
            $table->binary('captura_imagen')->nullable(); // Campo BLOB
            $table->timestamps();

            // Claves foráneas
            // $table->foreign('id_turno')->references('id')->on('rrhh_turno');
            // $table->foreign('id_personal')->references('id')->on('rrhh_personal');
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
