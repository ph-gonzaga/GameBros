<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

  
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.auth()->user()->id
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'E-mail já utilizado em outra conta!',
        ];
    }
}
