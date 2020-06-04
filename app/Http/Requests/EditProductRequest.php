<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
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
