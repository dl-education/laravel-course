<?php

namespace App\Http\Requests\Сategory;

use Illuminate\Validation\Rule;

class Update extends Store
{
    protected function makeUniqueRule(){
        return parent::makeUniqueRule()->ignore(request()->category->id);
    }
}
