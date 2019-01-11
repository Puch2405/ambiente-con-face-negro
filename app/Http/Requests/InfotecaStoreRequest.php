<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfotecaStoreRequest extends FormRequest
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
            'titulo'=>'required',
            'archivo'=>'required|mimes:pdf',
            'id_workalbum'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'Es necesario un titulo',
            'archivo.required' => 'Es necesario un archivo pdf',
            'archivo.mimes:pdf' => 'Solo son compatibles los archivos de tipo pdf',
            'id_workalbum.required' => 'Es necesario seleccionar un proyecto',
        ];
    }
}
