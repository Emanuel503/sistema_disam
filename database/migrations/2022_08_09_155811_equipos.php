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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_descripcion')->constrained('descripcion_equipos', 'id');
            $table->foreignId('id_ubicacion')->constrained('ubicacion_equipos', 'id');
            $table->foreignId('id_estado')->constrained('estados_equipos', 'id');
            $table->foreignId('id_fuente')->constrained('fuente_equipos', 'id');
            $table->foreignId('id_unidad')->constrained('dependencias', 'id');
            $table->string('codigo')->unique();
            $table->string('marca');
            $table->string('modelo');
            $table->string('serie');
            $table->string('color');
            $table->date('fecha_adquisicion');
            $table->float('valor_adquisicion');
            $table->float('valor_actual');
            $table->string('observacion')->nullable();
            $table->string('imagen')->nullable();
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
        Schema::dropIfExists('equipos');
    }
};
