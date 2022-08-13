<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class ChangePassword extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'current' => 'required|current_password',
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ];
    }

    public function attributes()
    {
        return [
            'current' => 'Текущий пароль',
            'password' => 'Новый пароль'
        ];
    }
}
