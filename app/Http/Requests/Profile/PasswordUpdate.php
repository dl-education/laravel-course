<?php

namespace App\Http\Requests\Profile;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class PasswordUpdate extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'current' => 'required|current_password',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function attributes()
    {
        return [
            'current' => 'текущий пароль',
            'password' => 'новый пароль',
        ];
    }

}
