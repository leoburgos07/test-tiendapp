<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required|string",
            "observations" => "required|string",
            "stock" => "required|integer|min:0",
            "boardingDate" => "required|date",
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "El nombre del producto es requerido",
            "observations.required" => "Las observaciones del producto son requeridas",
            "stock.required" => "La cantidad del producto es requerida",
            "stock.min" => "La cantidad debe ser positiva",
            "boardingDate.required" => "La fecha de embarque es requerida",
        ];
    }
}
