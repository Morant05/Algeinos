<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaquinaRequest extends FormRequest
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
            'nombre' => 'required|string|max:255|unique:maquinas,nombre,' . ($this->route('maquina')?->id ?? 'NULL'),
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'serie' => 'required|string|max:255|unique:maquinas,serie,' . ($this->route('maquina')?->id ?? 'NULL'),
            'estado' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
        ];
    }
}
