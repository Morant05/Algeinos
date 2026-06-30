<?php

namespace Database\Seeders;

use App\Models\Puesto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PuestosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *  @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $gerente = Puesto::create(['name' => 'gerente', 'descripcion' => 'Gerente']);
        $supervisorObras = Puesto::create(['name' => 'supervisor-obras', 'descripcion' => 'Supervisor de Obras']);
        $encargadoMaquinaria = Puesto::create(['name' => 'engargado-maquinaria', 'descripcion' => 'Encargado de Maquinaria']);
        $mecanico = Puesto::create(['name' => 'mecanico', 'descripcion' => 'Mecanico']);
        $encargadoAlmacen = Puesto::create(['name' => 'encargado-almacen', 'descripcion' => 'Encargado del Almacen']);
        $operadorMaquinaria = Puesto::create(['name' => 'operador-maquinaria', 'descripcion' => 'Operador de Maquinaria']);

        $gerente->givePermissionTo([
            'ver-categorias',
            'ver-maquinas',
            'ver-tipo-mantenimiento',
            'ver-mantenimientos',
            
        ]);

    }
}
