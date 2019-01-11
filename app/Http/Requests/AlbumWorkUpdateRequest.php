<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumWorkUpdateRequest extends FormRequest
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
            'titulov.required'=>'El video necesita un titulo',
            'link.required'=>'Se necesita el link de un video',
            'descripcion.required'=>'Se necesita una descripcion del trabajo',
            'cordenada.required'=>'Es necesario ingresar una cordenada',
        ];
    }
}
