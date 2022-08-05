<?php

namespace App\Http\Requests\Profile;

use App\Rules\CheckUserPassword;
use Illuminate\Foundation\Http\FormRequest;

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
            'current_password' => ['required', new CheckUserPassword() ],
            'password' => ['required', 'confirmed'],
        ];
    }

    public function attributes()
    {
        return [
            'current_password' => 'текущий пароль',
            'password' => 'новый пароль'
        ];
    }

}
