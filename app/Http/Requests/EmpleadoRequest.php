<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
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
        $empleadoId = $this->route('empleado')?->id;
        $passwordRules = in_array($this->method(), ['PUT', 'PATCH'])
            ? ['nullable', 'string', 'min:8', 'same:confirmar-password']
            : ['required', 'string', 'min:8', 'same:confirmar-password'];
        return [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|unique:empleados,email,' . ($empleadoId ?? 'NULL'),
            'estado' => 'required|in:activo,inactivo',
            'empresa_id' => 'required|exists:empresas,id',
            'rol' => 'required|exists:roles,name',
            'password' => $passwordRules,
            'confirmar-password' => ['required_with:password', 'same:password'],
        ];
    }
}
