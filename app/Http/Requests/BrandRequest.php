<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            "reference" => "required|string|max:6|min:6"
        ];
    }

    public function messages(){
        return [
            "name.required" => "El nombre de la marca es requerido",
            "reference.required" => "La referencia de la marca es obligatoria",
            "reference.min" => "La referencia debe contener 6 caracteres",
            "reference.max" => "La referencia debe contener 6 caracteres",
        ];
    }
}
