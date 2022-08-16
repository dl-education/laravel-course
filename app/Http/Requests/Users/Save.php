<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AllInModel;
use App\Models\Role;

class Save extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        // return Gate::allows('admin-tags');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:10',
            'email' => 'required|max:256',
            'roles' => [ 'required', 'array', 'min:1', new AllInModel(Role::class) ]
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Имя',
            'email' => 'Почта',
            'roles' => 'Список ролей'
        ];
    }

    public function messages()
    {
        return [
            'title.min' => 'Слишком коротко! 10 давай',
            'tags.required' => 'Хотя бы 1 тег'
        ];
    }
}
