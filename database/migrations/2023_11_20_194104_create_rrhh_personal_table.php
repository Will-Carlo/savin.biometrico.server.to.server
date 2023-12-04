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
        Schema::create('rrhh_personal', function (Blueprint $table) {
            $table->id();
            
            $table->string('paterno')->nullable();
            $table->string('materno')->nullable();
            $table->string('nombres')->nullable();
            $table->string('numero_documento')->nullable();
            $table->string('sigla')->nullable();
            $table->unsignedInteger('id_area');
            $table->date('fecha_nacimiento')->nullable();
            $table->unsignedInteger('ind_genero')->nullable();
            $table->string('email')->nullable();
            $table->string('numero_celular')->nullable();
            $table->string('direccion')->nullable();
            $table->string('ruta_archivo')->nullable();
            $table->unsignedInteger('id_ciudad')->nullable();

            // $table->string('usuario_reg')->nullable();
            // $table->dateTime('fecha_reg')->nullable();
            // $table->string('ip_reg')->nullable();
            // $table->string('usuario_mod')->nullable();
            // $table->dateTime('fecha_mod')->nullable();
            // $table->string('ip_mod')->nullable();
            // $table->string('estado', 3);

            $table->binary('finger');
            $table->timestamps();

            // $table->foreign('id_area')->references('id')->on('nombre_tabla_area');
            // $table->foreign('id_ciudad')->references('id')->on('nombre_tabla_ciudad');
     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rrhh_personal');
    }
};
