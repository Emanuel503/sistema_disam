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
        Schema::create('correspondencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained('users', 'id')->nullable();
            $table->foreignId('id_usuario_adiciono')->constrained('users', 'id');
            $table->date('fecha');
            $table->time('hora');
            $table->string('procedencia');
            $table->string('observacion')->nullable();
            $table->string('extracto');
            $table->string('urgencia')->nullable();
            $table->string('resuelto')->nullable();;
            $table->char('opcion1')->nullable();
            $table->char('opcion2')->nullable();
            $table->char('opcion3')->nullable();
            $table->char('opcion4')->nullable();
            $table->char('opcion5')->nullable();
            $table->char('opcion6')->nullable();
            $table->char('opcion7')->nullable();
            $table->char('opcion8')->nullable();
            $table->char('opcion9')->nullable();
            $table->char('opcion10')->nullable();
            $table->char('opcion11')->nullable();
            $table->char('opcion12')->nullable();
            $table->char('opcion13')->nullable();
            $table->char('opcion14')->nullable();
            $table->char('opcion15')->nullable();
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
        Schema::dropIfExists('correspondencias');
    }
};