<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BitacoraRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'obra_id' => 'required|exists:obras,id',
            'empleado_id' => 'required|exists:empleados,id',
            'fecha' => 'required|date',
            'actividades' => 'required|string|max:255',
            'comentarios' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'obra_id.required' => 'La obra es obligatoria.',
            'obra_id.exists' => 'La obra seleccionada no existe.',

            'empleado_id.required' => 'El empleado es obligatorio.',
            'empleado_id.exists' => 'El empleado seleccionado no existe.',

            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date' => 'La fecha no es válida.',

            'actividades.required' => 'Las actividades son obligatorias.',
            'actividades.max' => 'Las actividades no deben exceder los 1000 caracteres.',

            'comentarios.max' => 'Los comentarios no deben exceder los 1000 caracteres.',
        ];
    }
}
