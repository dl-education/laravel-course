<?php

namespace App\Rules;

use App\Models\Tag;
use Illuminate\Contracts\Validation\InvokableRule;

class ExistsTags implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
       if (Tag::whereIn('id', $value)->count() !== count($value)) {
            $fail('В поле :attribute был передан некорректный тег - выберите нужные из списка');
       }
    }
}
