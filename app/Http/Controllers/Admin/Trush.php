<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post as MPost;

class Trush extends Controller
{
    public function index()
    {
        return view('admin.trush', [
            'posts' => MPost::onlyTrashed()->orderByDesc('created_at')->paginate(5),
        ]);
    }

    public function deleteForever($id)
    {
        $post = MPost::onlyTrashed()->findOrFail($id);
        $post->forceDelete();
        return redirect()->back();
    }

    public function restoreOne (Request $request) 
    {
        MPost::onlyTrashed()->findOrFail($request->id)->restore();
        return redirect()->back();
    }

    public function restoreAll ()
    {
        MPost::onlyTrashed()->restore();
        return redirect()->route('posts.index');
    }

    public function deleteAll ()
    {
        MPost::onlyTrashed()->forceDelete();
        return redirect()->route('posts.index');
    }
}
