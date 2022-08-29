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
        Schema::create('actividades_paos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_seguimiento')->constrained('seguimientos_paos', 'id');
            $table->foreignId('id_dependencia')->constrained('dependencias', 'id');
            $table->foreignId('id_estado')->constrained('estados_paos', 'id');
            $table->string('actividad');
            $table->string('indicador');
            $table->string('verificacion');
            $table->string('meta');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('observacion');
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
        Schema::dropIfExists('actividades_paos');
    }
};
