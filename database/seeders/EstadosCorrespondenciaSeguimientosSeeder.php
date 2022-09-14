<?php

namespace Database\Seeders;

use App\Models\EstadosCorrespondenciaSeguimientos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadosCorrespondenciaSeguimientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estado = EstadosCorrespondenciaSeguimientos::create([
            'estado' => 'Recibido',
        ]);
        $estado = EstadosCorrespondenciaSeguimientos::create([
            'estado' => 'Resuelto',
        ]);
        $estado = EstadosCorrespondenciaSeguimientos::create([
            'estado' => 'No resuelto',
        ]);
    }
}
