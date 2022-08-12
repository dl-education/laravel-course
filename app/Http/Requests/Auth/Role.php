<?php

namespace App\Http\Requests\Auth;

use App\Models\Role as MRole;
use App\Rules\CheckArray;
use Illuminate\Foundation\Http\FormRequest;

class Role extends FormRequest
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
            'roles' => ['required', 'array','min:1', new CheckArray(MRole::class)]
        ];
    }

    public function messages()
    {
        return [
            'roles.required' => 'Выберите хотя бы одну роль'
        ];
    }
}
