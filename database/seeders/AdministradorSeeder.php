<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = Usuario::create([
            'email' => 'robertorvmx@gmail.com',
            'nombre'  =>  'Roberto Rodríguez Velázquez',
            'password'  =>  Hash::make('123'),
        ]);

        $usuario->assignRole('super-admin');
    }
}
