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
        Schema::create('trimestres_paos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_actividades')->constrained('actividades_paos', 'id');
            $table->foreignId('id_estado')->constrained('estados_paos', 'id');
            $table->string('trimestre');
            $table->string('programado');
            $table->string('realizado');
            $table->string('porcentaje');
            $table->string('observaciones');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
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
        Schema::dropIfExists('trimestres_paos');
    }
};
