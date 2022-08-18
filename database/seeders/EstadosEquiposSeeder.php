<?php

namespace Database\Seeders;

use App\Models\EstadosEquipos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosEquiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permiso1 = EstadosEquipos::create([
            'estado' => 'Bueno',
        ]);

        $permiso1 = EstadosEquipos::create([
            'estado' => 'Malo',
        ]);

        $permiso1 = EstadosEquipos::create([
            'estado' => 'Regular',
        ]);
    }
}
