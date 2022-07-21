<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Base64Json implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        return json_decode(base64_decode($value), true);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return base64_encode(json_encode($value));
    }
}
