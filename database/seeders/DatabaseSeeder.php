<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(DepartamentosSeeder::class);
        $this->call(MunicipiosSeeder::class);
        $this->call(LugaresSeeder::class);
        $this->call(SalasSeeder::class);
        $this->call(EstadosUsuariosSeeder::class);
        $this->call(DependenciasSeeder::class);
        $this->call(UsuariosSeeder::class);
        $this->call(AutorizacionesSeeder::class);
        $this->call(EstadosActividadesSeeder::class);
        $this->call(EstadosRegistrosSalidasSeeder::class);
        $this->call(TipoPermisoSeeder::class);
        $this->call(TiposCoordinacionesSeeder::class);
        $this->call(MotivosPermisosSeeder::class);
        $this->call(EstadosPermisosSeeder::class);
        $this->call(EstadosEquiposSeeder::class);
        $this->call(MotivosMovimientosEquiposSeedeer::class);
        $this->call(EstadosPaosSeeder::class);
    }
}