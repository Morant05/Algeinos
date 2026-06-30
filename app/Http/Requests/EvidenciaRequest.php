<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvidenciaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
           'empresa_id'    => 'required|exists:empresas,id|max:255',
            'empleado_id'   => 'required|exists:empleados,id|max:255',
            'incidencia_id' => 'required|exists:incidencias,id|max:255',
            'nombre'        => 'required|string|max:255',
            'tipo'          => 'required|string|max:50',
            'ruta'          => 'required|string|max:255',
            'tamaño'        => 'required|integer|max:255',
        ];
    }
}
