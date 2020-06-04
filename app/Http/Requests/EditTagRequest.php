<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditTagRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name' => 'required|unique:categories|max:255',
        ];
    }
    
    public function messages()
    {
        return [
            'name.unique' => 'Tag com nome já cadastrado!',
        ];
    }
}
