<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UsuariosRequest extends FormRequest
{
    /**
     * Determinar si el usuario está autorizado para realizar esta solicitud.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can(['crear-usuario', 'editar-usuario']);
    }

    /**
     * Preparar los datos para la validación.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if ($this->route()->usuario) {
            $this->merge([
                'id' => Hashids::decode($this->route()->usuario)[0],
            ]);
        }
    }

    /**
     * Obtenga las reglas de validación que se aplican a la solicitud.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', in_array($this->method(), ['PUT', 'PATCH']) ? Rule::unique('usuarios', 'email')->ignore($this->request->get('id'), 'id') : Rule::unique('usuarios', 'email')],
            'password' => [in_array($this->method(), ['PUT', 'PATCH']) ? '' : 'required', 'same:confirmar-password'],
            'rol' => 'required'
        ];
    }

    /**Obtenga los atributos
     * @return array
     */
    public function attributes()
    {
        return [
            'nombre' => 'nombre',
            'password' => Hash::make('password'),
            'rol' => 'rol',
        ];
    }
}
