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
            'email' => 'selenem563@gmail.com',
            'nombre'  =>  'Selene Morales',
            'password'  =>  Hash::make('1601'),
        ]);

        $usuario->assignRole('super-admin');
    }
}

