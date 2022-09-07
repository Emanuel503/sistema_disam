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
        Schema::create('memos_internos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tecnico')->constrained('users', 'id');
            $table->foreignId('id_usuario_adiciono')->constrained('users', 'id');
            $table->foreignId('id_estado')->constrained('estados_paos', 'id');
            $table->string('numero_memo');
            $table->date('fecha_memo');
            $table->string('destino');
            $table->string('asunto');
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
        Schema::dropIfExists('memos_internos');
    }
};