<?php

namespace Database\Seeders;

use App\Models\TiposEstablecimientosAlimentos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposEstablecimientosAlimentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo=TiposEstablecimientosAlimentos::create([
            'nombre' => 'Bodega Seca',
        ]);

        $tipo=TiposEstablecimientosAlimentos::create([
            'nombre' => 'Restaurante',
        ]);
        $tipo=TiposEstablecimientosAlimentos::create([
            'nombre' => 'Auto Hotel',
        ]);

        $tipo=TiposEstablecimientosAlimentos::create([
            'nombre' => 'Cafeteria',
        ]);

        $tipo=TiposEstablecimientosAlimentos::create([
            'nombre' => 'Comida Rapida',
        ]);

        $tipo=TiposEstablecimientosAlimentos::create([
            'nombre' => 'Cafe Bar',
        ]);

        $tipo=TiposEstablecimientosAlimentos::create([
            'nombre' => 'Chalet',
        ]);

        $tipo=TiposEstablecimientosAlimentos::create([
            'nombre' => 'Comedor',
        ]);

        $tipo=TiposEstablecimientosAlimentos::create([
            'nombre' => 'Pupuseria',
        ]);

        $tipo=TiposEstablecimientosAlimentos::create([
            'nombre' => 'Heladeria',
        ]);

        $tipo=TiposEstablecimientosAlimentos::create([
            'nombre' => 'Hotel',
        ]);

        $tipo=TiposEstablecimientosAlimentos::create([
            'nombre' => 'Mini Super',
        ]);

        $tipo=TiposEstablecimientosAlimentos::create([
            'nombre' => 'Panaderia',
        ]);

        $tipo=TiposEstablecimientosAlimentos::create([
            'nombre' => 'Rancho',
        ]);

        $tipo=TiposEstablecimientosAlimentos::create([
            'nombre' => 'Sala de ventas',
        ]);

        $tipo=TiposEstablecimientosAlimentos::create([
            'nombre' => 'Tienda',
        ]);
    }
}