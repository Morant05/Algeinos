<?php

namespace Tests\Unit;

use App\Models\Empleado;
use Tests\TestCase;

class EmpleadoTest extends TestCase
{
    public function test_it_allows_mass_assignment_for_apellido_and_estado(): void
    {
        $empleado = new Empleado([
            'nombre' => 'Ana',
            'apellido' => 'Pérez',
            'estado' => 'inactivo',
        ]);

        $this->assertSame('Pérez', $empleado->apellido);
        $this->assertSame('inactivo', $empleado->estado);
    }
}
