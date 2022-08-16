<?php

namespace App\Http\Requests\Posts;

use Illuminate\Support\Facades\Gate;
use App\Models\Post;

class Update extends Save
{
    public function authorize(){
        return true;
        // return Gate::allows('admin') or Gate::allows('moderator') or $this->user()->id == Post::findOrFail($this->id)->user_id;
    }
}