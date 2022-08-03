<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/*
    Проверяет, что:
        - каждый элемент массива $values нормальный id
        - количество переданных id и количество найденных по ним записей совпадают

    Мягко удалённые id не найдутся.

    Отличается от array.*.exists тем, что:
        - учитывает softDeletes без ручного указания withoutTrashes
        - делает 1 запрос вместо N
        - ключ ошибки получается строго array, а не array.* и т.п.
*/

class AllInModel implements Rule
{
    protected string $model;

    public function __construct($modelClass)
    {
        $this->model = $modelClass;
    }

    public function passes($attribute, $value)
    {
        foreach($value as $id){
            if(!preg_match('/^[1-9]+\d*$/', $id)){
                return false;
            }
        }

        $cnt = $this->model::whereIn('id', $value)->count();
        return $cnt === count($value);
    }

    public function message()
    {
        return trans('validation.allInModel');
    }
}
