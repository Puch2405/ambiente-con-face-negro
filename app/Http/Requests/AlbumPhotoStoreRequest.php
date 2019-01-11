<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumPhotoStoreRequest extends FormRequest
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
            'Titulo'=>'required',
            'archivo'=>'required|mimes:jpeg,png,jpg',
        ];
    }
    public function messages()
    {
        return [
            'Titulo.required' => 'Es necesario un titulo',
            'archivo.required' => 'Es necesario un archivo',
            'archivo.mimes:jpeg,png,jpg' => 'Solo son compatibles los archivos de imagen',
        ];
    }
}
