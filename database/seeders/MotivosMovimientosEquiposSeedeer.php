<?php

namespace Database\Seeders;

use App\Models\MotivosMovimientosEquipos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotivosMovimientosEquiposSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $motivo=MotivosMovimientosEquipos::create([
            'motivo' => 'Capacitacion',
        ]);
        $motivo=MotivosMovimientosEquipos::create([
            'motivo' => 'Prestamo',
        ]);
        $motivo=MotivosMovimientosEquipos::create([
            'motivo' => 'Reparación',
        ]);
        $motivo=MotivosMovimientosEquipos::create([
            'motivo' => 'Reunion de trabajo',
        ]);
        $motivo=MotivosMovimientosEquipos::create([
            'motivo' => 'Talleres',
        ]);
        $motivo=MotivosMovimientosEquipos::create([
            'motivo' => 'Traslados',
        ]);
    }
}