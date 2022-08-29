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
        Schema::create('seguimientos_paos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_objetivo')->constrained('objetivos_paos', 'id');
            $table->foreignId('id_estado')->constrained('estados_paos', 'id');
            $table->string('resultado');
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
        Schema::dropIfExists('seguimientos_paos');
    }
};
