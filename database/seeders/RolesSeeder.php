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
        $empleado = Role::create(['name' => 'empleado', 'descripcion' => 'Empleado']);
        $gerente = Role::create(['name' => 'gerente', 'descripcion' => 'Gerente']);
        $supervisorObras = Role::create(['name' => 'supervisor-obras', 'descripcion' => 'Supervisor de Obras']);
        $encargadoMaquinaria = Role::create(['name' => 'engargado-maquinaria', 'descripcion' => 'Encargado de Maquinaria']);
        $mecanico = Role::create(['name' => 'mecanico', 'descripcion' => 'Mecanico']);
        $operadorMaquinaria = Role::create(['name' => 'operador-maquinaria', 'descripcion' => 'Operador de Maquinaria']);

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
        $empleado->givePermissionTo([
            'ver-obras',
            'ver-asignacion-maquinas',
        ]);

        $gerente->givePermissionTo([
            'ver-categorias',
            'ver-maquinas',
            'ver-asignacion-maquinas',
            'ver-tipo-mantenimiento',
            'ver-mantenimiento',
            'ver-empleados',
            'ver-obras'
        ]);

        $supervisorObras->givePermissionTo([
            'ver-obras',
            'crear-obras',
            'editar-obras',
            'eliminar-obras',
            'ver-empleados',
        ]);

        $encargadoMaquinaria->givePermissionTo([
            'ver-maquinas',
            'crear-maquinas',
            'editar-maquinas',
            'eliminar-maquinas',
            'ver-asignacion-maquinas',
            'crear-asignacion',
            'editar-asignacion',
            'eliminar-asignacion',
            'crear-mantenimiento',
            'editar-mantenimiento',
            'eliminar-mantenimiento',
        ]);

        $mecanico->givePermissionTo([
            'ver-mantenimiento',
            'ver-tipo-mantenimiento',
            'crear-tipo-mantenimiento',
            'editar-tipo-mantenimiento',
            'eliminar-tipo-mantenimiento',
        ]);

        $operadorMaquinaria->givePermissionTo([
            'ver-asignacion-maquinas',
        ]);

    }
}
