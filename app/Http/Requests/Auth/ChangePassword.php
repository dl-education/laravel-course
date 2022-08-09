<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class ChangePassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'old_password' => ['required'],
            'new_password' => ['required', Password::defaults()],
        ];
    }

    public function authenticatePassword(){
        $password = $this->request->get('old_password');
        if (! Hash::check($password, Auth::user()->getAuthPassword())) {
            throw ValidationException::withMessages([
                'old_password' => trans('auth.failed-change-password'),
            ]);
        }
    }
}
