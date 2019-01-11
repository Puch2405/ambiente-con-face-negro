<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoStoreRequest extends FormRequest
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
            'descripcion'=>'required',
            'archivo'=>'required|mimes:jpeg,png,jpg',
            'id_album'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'Es necesario un titulo',
            'descripcion.required'=>'Es necesario una descripcion',
            'archivo.required' => 'Es necesario un archivo',
            'archivo.mimes:jpeg,png,jpg' => 'Solo son compatibles los archivos de imagen',
            'id_album.required' => 'Es necesario seleccionar un album',
        ];
    }
}
