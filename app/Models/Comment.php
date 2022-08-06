<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [ 'text' ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function scopeAccept($query, $param)
    {
        return function ($query) use ($param) {
            $query->where('status', $param);
        };
    }
}
