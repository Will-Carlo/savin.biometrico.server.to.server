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
        Schema::create('rrhh_punto_asistencia', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('direccion', 255);
            $table->string('responsable', 255);
            $table->string('direccion_mac', 45);
            $table->unsignedBigInteger('id_sucursal');
            $table->unsignedBigInteger('id_almacen');
            $table->timestamps();

            // Claves foráneas
           //  $table->foreign('id_sucursal')->references('id')->on('inv_sucursal');
           //  $table->foreign('id_almacen')->references('id')->on('inv_almacen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rrhh_punto_asistencia');
    }
};
