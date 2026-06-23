<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Restablecer roles y permisos almacenados en caché
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        //Creamos los roles correspondientes
        $superadmin = Role::create(['name' => 'super-admin', 'descripcion' => 'Super Administrador']);
        $admin = Role::create(['name' => 'admin', 'descripcion' => 'Administrador']);
        //Asignamos los permisos a los roles correspondientes
        $superadmin->givePermissionTo(Permission::all());
        $admin->givePermissionTo([
            'cambio-password',
            'ver-usuarios',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',
            'restaurar-usuario',
            'ver-roles',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            'mostrar-permisos',
        ]);
    }
}
