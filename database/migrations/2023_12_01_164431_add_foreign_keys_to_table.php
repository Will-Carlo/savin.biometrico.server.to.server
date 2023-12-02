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
        
        // Claves foráneas
        // $table->foreign('nombre_de_la_columna')->references('nombre_columna_referenciada')->on('tabla_referenciada');
        
        
        Schema::table('rrhh_asistencia', function (Blueprint $table) {
            $table->foreign('id_turno')->references('id')->on('rrhh_turno');
            $table->foreign('id_personal')->references('id')->on('rrhh_personal');
        });
        
        Schema::table('rrhh_turno_asignado', function (Blueprint $table) {
            $table->foreign('id_turno')->references('id')->on('rrhh_turno');
            $table->foreign('id_personal')->references('id')->on('rrhh_personal'); 
            $table->foreign('id_punto_asistencia')->references('id')->on('rrhh_punto_asistencia')->nullable();
        });

        Schema::table('rrhh_punto_asistencia', function (Blueprint $table) {
            $table->foreign('id_sucursal')->references('id')->on('inv_sucursal');
            $table->foreign('id_almacen')->references('id')->on('inv_almacen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rrhh_asistencia', function (Blueprint $table) {
            $table->dropForeign(['id_turno']);
            $table->dropForeign(['id_personal']);
        });
        Schema::table('rrhh_turno_asignado', function (Blueprint $table) {
            $table->dropForeign(['id_turno']);
            $table->dropForeign(['id_personal']);
            $table->dropForeign(['id_punto_asistencia']);
        });
        Schema::table('rrhh_punto_asistencia', function (Blueprint $table) {
            $table->dropForeign(['id_sucursal']);
            $table->dropForeign(['id_almacen']);
        });
    }
};
