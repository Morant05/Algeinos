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
            'email' => 'martinezdavid8288@gmail.com',
            'nombre'  =>  'David',
            'password'  =>  Hash::make('1608'),
        ]);

        $usuario->assignRole('super-admin');
    }
}
