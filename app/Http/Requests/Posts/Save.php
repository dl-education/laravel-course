<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AllInModel;
use App\Models\Tag;

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
            'title' => 'required|min:10',
            'content' => 'required|max:256',
            'tags' => [ 'required', 'array', 'min:1', new AllInModel(Tag::class) ]
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Заголовок',
            'content' => 'Текст поста',
            'tags' => 'Список тегов'
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
