<?php

namespace Database\Seeders;

use App\Models\TiposEstablecimientos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposEstablecimientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo=TiposEstablecimientos::create([
            'establecimiento' => 'Sistema de agua',
        ]);

        $tipo=TiposEstablecimientos::create([
            'establecimiento' => 'Piscina',
        ]);

        $tipo=TiposEstablecimientos::create([
            'establecimiento' => 'Establecimiento DB',
        ]);

        $tipo=TiposEstablecimientos::create([
            'establecimiento' => 'Rancho',
        ]);

        $tipo=TiposEstablecimientos::create([
            'establecimiento' => 'Sustancias quimicas peligrosas',
        ]);

        $tipo=TiposEstablecimientos::create([
            'establecimiento' => 'Alimentos',
        ]);

        $tipo=TiposEstablecimientos::create([
            'establecimiento' => 'Embazadora de agua',
        ]);

        $tipo=TiposEstablecimientos::create([
            'establecimiento' => 'Granja',
        ]);
    }
}