<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('fallas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->enum('estado', ['pendiente', 'resuelta'])->default('pendiente');
            $table->string('categoria')->nullable();
            $table->unsignedBigInteger('maquina_id')->nullable();
            $table->unsignedBigInteger('tecnico_id')->nullable(); // si se asigna a alguien
            $table->timestamps();

            $table->foreign('maquina_id')->references('id')->on('maquinas')->onDelete('set null');
            $table->foreign('tecnico_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fallas');
    }
};