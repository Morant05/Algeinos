<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RentaRequest extends FormRequest
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
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'total' => 'required|numeric|min:0',
            'empresa_id' => 'required|exists:empresas,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'extra' => 'nullable|numeric|min:0',
            'estado' => 'required|in:aceptada,denegada,pendiente',
        ];
    }
}
