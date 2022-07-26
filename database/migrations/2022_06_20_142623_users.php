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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rol')->constrained('roles', 'id');
            $table->foreignId('id_dependencia')->constrained('dependencias', 'id');
            $table->foreignId('id_estado')->constrained('estados_usuarios', 'id');
            $table->string('codigo_marcacion')->unique()->nullable();;
            $table->string('email')->unique();
            $table->string('usuario')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('cargo');
            $table->string('ubicacion');
            $table->string('telefono');
            $table->date('fecha_ingreso')->nullable();
            $table->double('dias_enfermedad_informales');
            $table->double('dias_enfermedad_formales');
            $table->double('dias_personales');
            $table->string('motorista');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};