<?php

namespace App\Http\Requests\Video;

use Illuminate\Foundation\Http\FormRequest;

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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'slug' => 'required|max:64|min:3',
            'code' => 'required|max:16|min:3',
        ];
    }

    public function attributes()
    {
        return [
            'code' => 'Видео код',
            'slug' => 'Идентификатор видео'
        ];
    }
}
