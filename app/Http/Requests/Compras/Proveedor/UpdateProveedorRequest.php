<?php

namespace App\Http\Requests\Compras\Proveedor;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProveedorRequest extends FormRequest
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
            'prov_ruc' => 'required',
            'prov_correo' => 'required|email',
            'prov_direccion' => 'required',
            'prov_telefono' => 'required',
            'ciudad_id' => 'required|exists:ciudades,id',
        ];
    }
}
