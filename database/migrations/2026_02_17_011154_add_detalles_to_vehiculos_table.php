<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecutar migration
     */
    public function up()
    {
        Schema::table('vehiculos', function (Blueprint $table) {

            // tipo de transmision
            $table->string('transmision')->nullable();

            // numero de pasajeros
            $table->integer('pasajeros')->nullable();

            // aire acondicionado (true o false)
            $table->boolean('aire_acondicionado')->default(true);

            // tipo de vehiculo (Sedán, Hatchback, SUV, 4x4)
            $table->string('tipo')->nullable();

        });
    }


    /**
     * Revertir migration
     */
    public function down()
    {
        Schema::table('vehiculos', function (Blueprint $table) {

            $table->dropColumn([
                'transmision',
                'pasajeros',
                'aire_acondicionado',
                'tipo'
            ]);

        });
    }

};