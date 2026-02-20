<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('vehiculo_id')
                  ->constrained('vehiculos')
                  ->onDelete('cascade');

            $table->date('fecha_inicio');
            $table->date('fecha_fin');

            $table->decimal('total', 10, 2);

            $table->enum('estado', ['pendiente', 'confirmada', 'cancelada'])
                  ->default('pendiente');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};