<?php

namespace App\Http\Requests\Tags;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Save extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // + ignore on edit
        return [
            'url' => ['required', 'min:4', 'max:64', $this->makeUniqueRule()],
            'title' => ['required', 'min:4', 'max:64', $this->makeUniqueRule()],
            'description' => 'nullable|min:4'
        ];
    }

    public function attributes()
    {
        return [
            'url' => 'Url тега',
            'title' => 'Название тега',
            'description' => 'Описание тега'
        ];
    }

    protected function makeUniqueRule(){
        return Rule::unique('tags');
    }
}
