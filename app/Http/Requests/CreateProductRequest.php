<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

 
    public function rules()
    {
        return [
            'name' => 'required|unique:products|max:255',
            'image' => 'required|image',
            'description' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'type' => 'required',
            'warranty' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.image' => 'Formato de imagem inválido!',
            'name.unique' => 'Produto com nome já cadastrado!'
        ];
    }
}
