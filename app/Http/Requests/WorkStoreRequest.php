<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkStoreRequest extends FormRequest
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
            'id_workalbum'=>'required',
        ];
        $archivos = count($this->input('archivos'));
        foreach(range(0, $archivos) as $index) {
            $rules['archivos.' . $index] = 'required|mimes:jpeg,png,jpg|max:2000';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'archivos.required' => 'Es necesario un archivo como minimo',
            'archivos.mimes:jpeg,png,jpg' => 'Solo son compatibles los archivos de imagen',
            'id_workalbum.required' => 'Es necesario seleccionar un album',
        ];
    }
}
