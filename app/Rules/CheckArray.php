<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckArray implements Rule
{
    public string $model;

    public function __construct($model)
    {
       
        $this->model = $model;
    }

    public function passes($attribute, $array)
    {
        foreach ($array as $id){
            if(!preg_match('/^[1-9]+\d*$/', $id)){
                return false;
            }
        }
        
        $tags = $this->model::pluck('id')->toArray();
        $checkableArray = array_diff($array, $tags);
        return empty($checkableArray) ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.checkArray');
    }
}
