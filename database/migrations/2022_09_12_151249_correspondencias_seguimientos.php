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
        Schema::create('correspondencias_seguimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_correspondencia')->constrained('correspondencias', 'id');
            $table->foreignId('id_usuario_adiciono')->constrained('users', 'id');
            $table->string('seguimiento');
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
        Schema::dropIfExists('correspondencias_seguimientos');
    }
};