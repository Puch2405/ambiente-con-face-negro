<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUpdateRequest extends FormRequest
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
        $rules = [
            'nombre'=>'required',
            'descripcion'=>'required',
        ];
        if($this->get('archivo'))
            $rules = array_merge($rules,['archivo' => 'mimes:jpg,jpeg,png']);
        return $rules;
    }
    public function messages()
    {
        return [
            'nombre.required' => 'Es necesario un nombre',
            'descripcion.required' => 'Es necesario una descripcion',
            'archivo.required' => 'Es necesario un archivo',
            'archivo.mimes:jpeg,png,jpg' => 'Solo son compatibles los archivos de imagen',
        ];
    }
}
