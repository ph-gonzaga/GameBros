<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCategoryRequest extends FormRequest
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
            'name.unique' => 'Categoria com nome já cadastrado!',
        ];
    }
}
