<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //Usuarios
            ['permiso' => 'cambio-password', 'grupo' => 'usuarios'],
            ['permiso' => 'ver-usuarios', 'grupo' => 'usuarios'],
            ['permiso' => 'crear-usuario', 'grupo' => 'usuarios'],
            ['permiso' => 'editar-usuario', 'grupo' => 'usuarios'],
            ['permiso' => 'borrar-usuario', 'grupo' => 'usuarios'],
            ['permiso' => 'restaurar-usuario', 'grupo' => 'usuarios'],

            //Roles
            ['permiso' => 'ver-roles', 'grupo' => 'roles'],
            ['permiso' => 'crear-rol', 'grupo' => 'roles'],
            ['permiso' => 'editar-rol', 'grupo' => 'roles'],
            ['permiso' => 'borrar-rol', 'grupo' => 'roles'],
            ['permiso' => 'mostrar-permisos', 'grupo' => 'roles'],
        ];

        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso['permiso'], 'descripcion' => $permiso['permiso'], 'grupo' => $permiso['grupo']]);
        }
    }
}
