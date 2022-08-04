<?php

namespace App\Http\Requests\Сategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Store extends FormRequest
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

    public function rules()
    {
        return [
            'name' => ['required', 'min:2', 'max:50', $this->makeUniqueRule()],
            'description' => ['required', 'min:10']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Имя',
            'description' => 'Описание'
        ];
    }

    protected function makeUniqueRule(){
        return Rule::unique('categories');
    }
}
