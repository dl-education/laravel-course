<?php

namespace App\Http\Requests\Tags;

class Update extends Save
{
    public function rules()
    {
        $rules = parent::rules();

        $rules['url']['unique'] = $rules['url']['unique']->ignore($this->route('id'));
        $rules['title']['unique'] = $rules['url']['unique']->ignore($this->route('id'));

        return $rules;
    }
}
