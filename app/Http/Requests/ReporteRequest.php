<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReporteRequest extends FormRequest
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
            //'obra_id' => 'required|exists:obras,id',
            'empleado_id' => 'required|exists:empleados,id|max:255',
            'tipo' => 'required|string|max:50',
            'contenido' => 'required|string|max:255',
            'fecha' => 'required|date|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'obra_id.required' => 'La obra es obligatoria',
            'empleado_id.required' => 'El empleado es obligatorio',
            'tipo.required' => 'El tipo de reporte es obligatorio',
            'contenido.required' => 'El contenido es obligatorio',
            'fecha.required' => 'La fecha es obligatoria',
        ];
    }
}