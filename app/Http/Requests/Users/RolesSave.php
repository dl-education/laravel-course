<?php

namespace App\Http\Requests\Users;

use App\Models\Role;
use App\Rules\AllInModel;
use Illuminate\Foundation\Http\FormRequest;

class RolesSave extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'roles' => [ 'required', 'array', 'min:1', new AllInModel(Role::class) ]
        ];
    }

    public function attributes()
    {
        return [
            'roles' => 'Список ролей'
        ];
    }

    public function messages()
    {
        return [
            'roles.required' => 'Хотя бы 1 роль'
        ];
    }
}
