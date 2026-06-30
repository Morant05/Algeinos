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
            ['permiso' => 'ver-obras', 'grupo' => 'empleados'],
            ['permiso' => 'ver-asignacion-maquinaria', 'grupo' => 'empleados'],
            ['permiso' => 'crear-obras', 'grupo' => 'empleados'],
            ['permiso' => 'editar-obras', 'grupo' => 'empleados'],
            ['permiso' => 'eliminar-obras', 'grupo' => 'empleados'],
            ['permiso' => 'crear-maquinas', 'grupo' => 'empleados'],
            ['permiso' => 'editar-maquinas', 'grupo' => 'empleados'],
            ['permiso' => 'eliminar-maquinas', 'grupo' => 'empleados'],
            
            
            

            //Sidebar
            ['permiso' => 'ver-tablero', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-categorias', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-maquinas', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-rentas', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-tipo-mantenimiento', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-mantenimientos', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-empresas', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-sucursales', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-empleados', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-puestos', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-clientes', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-incidentes', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-reportes', 'grupo' => 'sidebar'],
            ['permiso' => 'ver-bitacora', 'grupo' => 'sidebar'],


        ];

        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso['permiso'], 'descripcion' => $permiso['permiso'], 'grupo' => $permiso['grupo']]);
        }
    }
}
