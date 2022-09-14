<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $useradmin = User::create([
            'id_rol' => 1,
            'id_dependencia' => 3,
            'id_estado' => 1,
            'email' => 'admin@gmail.com',
            'usuario' => 'admin',
            'password' => Hash::make('admin'),
            'nombres' => 'Emanuel',
            'apellidos' => 'Molina',
            'cargo' => 'admin',
            'ubicacion' => 'DISAM',
            'telefono' => '2234-2345',
            'motorista' => 'no',
            'codigo_marcacion' => 'admin',
        ]);

        $user1 = User::create([
            'id_rol' => 2,
            'id_dependencia' => 3,
            'id_estado' => 1,
            'email' => 'user@gmail.com',
            'usuario' => 'usuario',
            'password' => Hash::make('admin'),
            'nombres' => 'Rafael',
            'apellidos' => 'Najarro',
            'cargo' => 'usuario',
            'ubicacion' => 'DISAM',
            'telefono' => '2234-2345',
            'motorista' => 'si',
            'codigo_marcacion' => 'user',
        ]);
    }
}
