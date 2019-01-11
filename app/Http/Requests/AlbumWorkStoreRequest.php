<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumWorkStoreRequest extends FormRequest
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
            'archivo'=>'required|mimes:jpeg,png,jpg',
            'titulov'=>'required',
            'link'=>'required',
            'descripcion'=>'required',
            'cordenada'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'titulo.required' => 'Es necesario un titulo',
            'archivo.required' => 'Es necesario un archivo',
            'archivo.mimes:jpeg,png,jpg' => 'Solo son compatibles los archivos de imagen',
            'titulov.required'=>'El video necesita un titulo',
            'link.required'=>'Se necesita el link de un video',
            'descripcion.required'=>'Se necesita una descripcion del trabajo',
            'cordenada.required'=>'Es necesario ingresar una cordenada',
        ];
    }
}
