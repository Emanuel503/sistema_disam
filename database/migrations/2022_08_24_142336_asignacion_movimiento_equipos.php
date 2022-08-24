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
        Schema::create('asignacion_movimiento_equipos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_movimiento')->constrained('movimiento_equipos', 'id');
            $table->foreignId('id_equipo')->constrained('equipos', 'id');
            $table->string('destino');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignacion_movimiento_equipos');
    }
};