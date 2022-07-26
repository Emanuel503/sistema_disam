<?php

namespace Database\Seeders;

use App\Models\Dependencias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DependenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dependencia=Dependencias::create([
            'nombre' => 'Unidad de Alimentos',
        ]);
        $dependencia=Dependencias::create([
            'nombre' => 'Area Administracion',
        ]);
        $dependencia=Dependencias::create([
            'nombre' => 'Area Informatica',
        ]);
        $dependencia=Dependencias::create([
            'nombre' => 'Unidad Juridica',
        ]);
        $dependencia=Dependencias::create([
            'nombre' => 'Unidad de Vigilancia de Enfermedades Transmitiras',
        ]);
        $dependencia=Dependencias::create([
            'nombre' => 'Unidad de Saneamiento Ambiental',
        ]);
        $dependencia=Dependencias::create([
            'nombre' => 'Fabrica de artefactos Sanitarios',
        ]);
        $dependencia=Dependencias::create([
            'nombre' => 'Unidad de Alcohol y Tabaco',
        ]);
        $dependencia=Dependencias::create([
            'nombre' => 'Unidad de Zoonosis',
        ]);
        $dependencia=Dependencias::create([
            'nombre' => 'Laboratorio de productos biologicos',
        ]);
        $dependencia=Dependencias::create([
            'nombre' => 'Unidad Ambiental',
        ]);
        $dependencia=Dependencias::create([
            'nombre' => 'Direccion',
        ]);
    }
}