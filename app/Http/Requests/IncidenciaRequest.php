<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncidenciaRequest extends FormRequest
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
            'usuario_id' => ['required', 'exists:usuarios,id','max:255'],
            'obra_id' => ['required', 'exists:obras,id','max:255'],
            'tipo' => ['required', 'string', 'max:255'],
            'prioridad' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255'],
            'fecha' => ['required','date','max:255'],
        ];
    }
}
