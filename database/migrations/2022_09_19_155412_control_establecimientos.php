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
        Schema::create('control_establecimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tipo')->constrained('tipos_establecimientos', 'id');
            $table->foreignId('id_usuario_adiciono')->constrained('users', 'id');
            $table->foreignId('id_departamento')->constrained('departamentos', 'id');
            $table->foreignId('id_municipio')->constrained('municipios', 'id');
            $table->string('nombre');
            $table->string('ubicacion');
            $table->string('titular');
            $table->string('estado'); //Funcionando - No funcionando
            $table->string('telefono');
            $table->string('tipo_servicio'); //Privado - Publico
            $table->string('permiso_funcionamiento'); //Si - No
            $table->date('fecha_emision_permiso')->nullable();
            $table->date('fecha_vencimiento_permiso')->nullable();
            $table->string('region');
            $table->string('sibasi');
            $table->string('establecimiento_salud');

            //Campos para tipo de establecimiento: Sistema Agua
            $table->string('viviendas_abastecidas_rural')->nullable();
            $table->string('poblacion_beneficiada_rural')->nullable();
            $table->string('viviendas_abastecidas_urbana')->nullable();
            $table->string('poblacion_beneficiada_urbana')->nullable();
            $table->string('plan_seguridad')->nullable(); //Si - No

            //Campos para tipo de establecimiento: Piscina
            $table->string('piscina_agua_superfial')->nullable(); //Si - No
            $table->string('piscina_con_circulacion')->nullable(); //Si - No

            //Campos para tipo de establecimiento: Establecimiento DB
            $table->string('actividad_realizada')->nullable();
            $table->string('empresa_recolectora')->nullable();
            $table->string('plan_recolectura')->nullable(); //Si - No
            $table->string('empresa_plan')->nullable(); //Si - No

            //Campos para tipo de establecimiento: Rancho
            $table->string('tipo_rancho')->nullable(); // Catalogo 
            $table->string('permiso_minsal')->nullable();

            //Campos para tipo de establecimiento: Sutancias quimicas peligrosas
            $table->string('sustancia_quimica')->nullable();
            $table->string('tipo_riesgo_quimico')->nullable(); // Catalogo 

            //Campos para tipo de establecimiento: Sutancias quimicas peligrosas
            $table->string('tipo_establecimiento_alimento')->nullable(); // Catalogo
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
        Schema::dropIfExists('control_establecimientos');
    }
};