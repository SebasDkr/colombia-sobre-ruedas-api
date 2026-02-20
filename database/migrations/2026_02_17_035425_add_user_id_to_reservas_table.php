<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecutar migración
     */
    public function up()
    {
        Schema::table('reservas', function (Blueprint $table) {

            // agregar relación con usuarios
            $table->foreignId('user_id')
                  ->nullable()
                  ->after('vehiculo_id') // buena práctica (opcional pero recomendado)
                  ->constrained('users')
                  ->onDelete('cascade');

        });
    }

    /**
     * Revertir migración
     */
    public function down()
    {
        Schema::table('reservas', function (Blueprint $table) {

            // eliminar relación
            $table->dropForeign(['user_id']);

            // eliminar columna
            $table->dropColumn('user_id');

        });
    }
};
