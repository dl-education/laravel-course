<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class Blog extends Controller
{
    public function tag($id){
        $tag = Tag::where('url', $id)->firstOrFail();
        return view('blog.tag', compact('tag'));
    }
}
