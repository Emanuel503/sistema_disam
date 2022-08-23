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
        Schema::create('asignacion_equipos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained('users', 'id');
            $table->foreignId('id_equipo')->constrained('equipos', 'id');
            $table->date('fecha_asignacion');
            $table->string('observacion');
            $table->string('estado');
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
        Schema::dropIfExists('asignacion_equipos');
    }
};
