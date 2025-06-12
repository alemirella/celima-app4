<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('fallas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sensor_id');
            $table->unsignedBigInteger('linea_id');
            $table->unsignedBigInteger('maquina_id');
            $table->string('titulo');
            $table->text('descripcion');
            $table->enum('estado', ['pendiente', 'resuelta'])->default('pendiente');
            $table->unsignedBigInteger('usuario_id')->nullable(); // técnico
            $table->dateTime('fecha_reporte');
            $table->dateTime('fecha_resolucion')->nullable();
            $table->timestamps();

            $table->foreign('sensor_id')->references('id')->on('sensores')->onDelete('cascade');
            $table->foreign('linea_id')->references('id')->on('lineas_produccion')->onDelete('cascade');
            $table->foreign('maquina_id')->references('id')->on('maquinas')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fallas');
    }
};