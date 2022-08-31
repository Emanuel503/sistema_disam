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
        Schema::create('tareas_paos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_trimestre')->constrained('trimestres_paos', 'id');
            $table->foreignId('id_usuario')->constrained('users', 'id');
            $table->foreignId('id_estado')->constrained('estados_paos', 'id');
            $table->string('tarea', '500');
            $table->string('observacion');
            $table->string('tiempo');
            $table->date('fecha');
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
        Schema::dropIfExists('tareas_paos');
    }
};
