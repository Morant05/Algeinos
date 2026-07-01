<?php

namespace Tests\Feature;

use App\Http\Requests\TmantenimientoRequest;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class TmantenimientoRequestTest extends TestCase
{
    public function test_it_validates_against_the_existing_tipo_mantenimientos_table(): void
    {
        $request = new TmantenimientoRequest();

        $validator = Validator::make(
            [
                'nombre' => 'Prueba de mantenimiento',
                'descripcion' => 'Descripción válida',
            ],
            $request->rules()
        );

        $this->assertFalse($validator->fails(), 'La validación debería aceptar datos válidos para la tabla tipo_mantenimientos.');
    }
}
