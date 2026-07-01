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

            //Empleados
            ['permiso' => 'crear-empleados', 'grupo' => 'empleados'],
            ['permiso' => 'editar-empleados', 'grupo' => 'empleados'],
            ['permiso' => 'eliminar-empleados', 'grupo' => 'empleados'],
            ['permiso' => 'ver-obras', 'grupo' => 'empleados'],
            ['permiso' => 'crear-obras', 'grupo' => 'empleados'],
            ['permiso' => 'editar-obras', 'grupo' => 'empleados'],
            ['permiso' => 'eliminar-obras', 'grupo' => 'empleados'],
            ['permiso' => 'crear-maquinas', 'grupo' => 'empleados'],
            ['permiso' => 'editar-maquinas', 'grupo' => 'empleados'],
            ['permiso' => 'eliminar-maquinas', 'grupo' => 'empleados'],
            ['permiso' => 'crear-asignacion', 'grupo' => 'empleados'],
            ['permiso' => 'editar-asignacion', 'grupo' => 'empleados'],
            ['permiso' => 'eliminar-asignacion', 'grupo' => 'empleados'],
            ['permiso' => 'crear-tipo-mantenimiento', 'grupo' => 'empleados'],
            ['permiso' => 'editar-tipo-mantenimiento', 'grupo' => 'empleados'],
            ['permiso' => 'eliminar-tipo-mantenimiento', 'grupo' => 'empleados'],
            ['permiso' => 'crear-mantenimiento', 'grupo' => 'empleados'],
            ['permiso' => 'editar-mantenimiento', 'grupo' => 'empleados'],
            ['permiso' => 'eliminar-mantenimiento', 'grupo' => 'empleados'],
            ['permiso' => 'crear-categorias', 'grupo' => 'empleados'],
            ['permiso' => 'editar-categorias', 'grupo' => 'empleados'],
            ['permiso' => 'eliminar-categorias', 'grupo' => 'empleados'],
            ['permiso' => 'crear-rentas', 'grupo' => 'empleados'],
            ['permiso' => 'editar-rentas', 'grupo' => 'empleados'],
            ['permiso' => 'eliminar-rentas', 'grupo' => 'empleados'],
            ['permiso' => 'crear-reportes', 'grupo' => 'empleados'],
            ['permiso' => 'editar-reportes', 'grupo' => 'empleados'],
            ['permiso' => 'eliminar-reportes', 'grupo' => 'empleados'],
            ['permiso' => 'crear-incidencias', 'grupo' => 'empleados'],
            ['permiso' => 'editar-incidencias', 'grupo' => 'empleados'],
            ['permiso' => 'eliminar-incidencias', 'grupo' => 'empleados'],

            //Sidebar
            ['permiso' => 'ver-tablero', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-categorias', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-maquinas', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-rentas', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-tipo-mantenimiento', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-mantenimiento', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-empresas', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-sucursales', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-empleados', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-clientes', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-asignacion-maquinas', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-incidencias', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-reportes', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-evidencias', 'grupo' => 'sidebar'],

            //Gerente
            ['permiso' => 'crear-clientes', 'grupo' => 'gerente'],
            ['permiso' => 'editar-clientes', 'grupo' => 'gerente'],
            ['permiso' => 'eliminar-clientes', 'grupo' => 'gerente'],
            ['permiso' => 'crear-sucursales', 'grupo' => 'gerente'],
            ['permiso' => 'editar-sucursales', 'grupo' => 'gerente'],
            ['permiso' => 'eliminar-sucursales', 'grupo' => 'gerente'],
            ['permiso' => 'crear-empresas', 'grupo' => 'gerente'],
            ['permiso' => 'editar-empresas', 'grupo' => 'gerente'],
            ['permiso' => 'eliminar-empresas', 'grupo' => 'gerente'],  
        ];

        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso['permiso'], 'descripcion' => $permiso['permiso'], 'grupo' => $permiso['grupo']]);
        }
    }
}
