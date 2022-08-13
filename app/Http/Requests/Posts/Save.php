<?php

namespace App\Http\Requests\Posts;

use App\Models\Post as MPost;
use App\Models\Tag as MTag;
use App\Rules\CheckArray;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class Save extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->route('id') ? Gate::allows('edit', MPost::findOrfail($this->route('id'))) : true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:100',
            'content' => 'required|max:256',
            'slug' => 'required|min:2|max:64',
            'category_id' => 'required',
            'tags' => ['required', 'array','min:1', new CheckArray(MTag::class)]
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Заголовок',
            'content' => 'Текст поста',
            'slug' => 'Идентификатор поста',
            'tags' => 'Теги'
        ];
    }

    public function messages()
    {
        return [
            'title.min' => 'Короткое имя',
            'tags.required' => 'Выберите хотя бы один тег'
        ];
    }
}
