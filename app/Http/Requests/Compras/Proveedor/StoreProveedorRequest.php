<?php

namespace App\Http\Requests\Compras\Proveedor;

use Illuminate\Foundation\Http\FormRequest;

class StoreProveedorRequest extends FormRequest
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
            'prov_razonsocial' => 'required',
            'prov_ruc' => 'required|max:20|unique:proveedores,prov_ruc',
            'prov_direccion' => 'required|max:250',
            'prov_telefono' => 'required|max:50',
            'prov_correo' => 'required|max:250|unique:proveedores,prov_correo',
            'ciudad_id' => 'required|integer|exists:ciudades,id',
        ];
    }

    public function messages(): array
    {
        return [
            
        ];
    }
}
