<?php

namespace App\Http\Requests\Comments;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'for' => 'required|in:post,video',
            'id' => 'required|integer',
            'text' => 'required|max:256'
        ];
    }
}
