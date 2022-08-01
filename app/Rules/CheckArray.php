<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckArray implements Rule
{
    public $model;

    public function __construct($model)
    {
       
        $this->model = $model;
    }

    public function passes($attribute, $value)
    {
       
        $tags = $this->model::pluck('id')->toArray();
        $checkableArray = array_diff($value, $tags);
        return empty($checkableArray) ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Вы пытаетсь добавить несуществующий id';
    }
}
