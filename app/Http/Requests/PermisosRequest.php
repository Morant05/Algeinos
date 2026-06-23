<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Vinkla\Hashids\Facades\Hashids;

class PermisosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if ($this->route()->permiso) {
            $this->merge([
                'id' => Hashids::decode($this->route()->permiso)[0],
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                in_array($this->method(), ['PUT', 'PATCH']) ? Rule::unique('permissions', 'name')->ignore($this->request->get('id'), 'id') : Rule::unique('permissions', 'name')
            ],
            'guard_name' => ['required', 'string', 'in:web,api'],
            'grupo' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'descripcion' => trans('panel.tablas.descripcion'),
            'name' => trans('panel.tablas.nombre'),
            'guard_name' => trans('panel.tablas.guard_name'),
            'grupo' => trans('panel.tablas.grupo'),
        ];
    }
}
