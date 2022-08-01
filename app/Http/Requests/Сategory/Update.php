<?php

namespace App\Http\Requests\Сategory;

use Illuminate\Validation\Rule;

class Update extends Store
{

    public function rules()
    {
        $rules = parent::rules();

        $rules['name']['unique'] = $rules['name']['unique']->ignore(request()->category->id);

        return $rules;
    }
}
