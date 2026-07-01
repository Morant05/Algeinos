<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class pagoRequest extends FormRequest
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
            'renta_id' => 'required|exists:rentas,id',
            'monto' => 'required|numeric|min:0',
            'fecha_pago' => 'required|date',
            'metodo_pago' => 'required|in:efectivo,tarjeta,transferencia',
            'referencia' => 'required|string|max:255',
            'estado' => 'required|in:realizado,denegado,pendiente',
            'observaciones' => 'nullable|string|max:255',
        ];
    }
}
