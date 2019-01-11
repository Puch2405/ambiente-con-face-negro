<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecorridoUpdateRequest extends FormRequest
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
            'id_workalbum'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'id_workalbum.required' => 'Es necesario seleccionar un proyecto',
        ];
    }
}
