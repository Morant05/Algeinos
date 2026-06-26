<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MantenimientoRequest extends FormRequest
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
            'maquina_id' => 'required|exists:maquinas,id',
            'tipo_id' => 'required|exists:tipo_mantenimientos,id',
            'fecha' => 'required|date',
            'costo' => 'required|numeric|min:0',
            'tiempo' => 'required|integer|min:0',
            'descripcion' => 'nullable|string',
        ];
    }
}
