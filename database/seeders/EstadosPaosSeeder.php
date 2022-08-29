<?php

namespace Database\Seeders;

use App\Models\EstadosPaos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadosPaosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estado = EstadosPaos::create([
            'estado' => 'Activo',
        ]);

        $estado = EstadosPaos::create([
            'estado' => 'Inactivo',
        ]);
    }
}