<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('obras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('direccion');
            $table->decimal('latitud');
            $table->decimal('longitud');
            $table->decimal('presupuesto');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->enum('estado', ['no iniciada','iniciada','pausada','finalizada'])->default('no iniciada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obras');
    }
};
