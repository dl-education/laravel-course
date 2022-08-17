<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AllInModel;
use App\Models\Role;

class Roles extends FormRequest
{
    public function authorize()
    {
        return true; // Gates::check('admin-users');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'roles' => [ 'required', 'array', 'min:1', new AllInModel(Role::class) ]
        ];
    }

    public function attributes()
    {
        return [
            'roles' => 'Роли на сайте'
        ];
    }

    public function messages()
    {
        return [
            'roles.required' => 'Хотя бы 1 роль'
        ];
    }
}
