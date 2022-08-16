<?php

namespace App\Http\Requests\Posts;

use Illuminate\Support\Facades\Gate;

class Update extends Save
{
    public function authorize(){
        // return true;
        return Gate::allows('admin') or Gate::allows('moderator');
    }
}