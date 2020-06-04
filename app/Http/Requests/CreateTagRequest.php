<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTagRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'name' => 'required|unique:tags|max:255',
            
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Tag com nome já cadastrado!',
        ];
    }
}
