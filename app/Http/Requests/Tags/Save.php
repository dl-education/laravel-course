<?php

namespace App\Http\Requests\Tags;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'url' => ['required', 'min:4', 'max:64', $this->makeUniqueRule() ],
            'title' => ['required', 'min:4', 'max:64', $this->makeUniqueRule() ],
            'description' => ['nullable','min:4'],
        ];
    }

    public function attributes()
    {
        return [
            'url' => 'url тега',
            'title' => 'Название тега',
            'description' => 'Описание тега'
        ];
    }

    protected function makeUniqueRule(){
        return Rule::unique('tags');
    }
}
