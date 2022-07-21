<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\Save as SaveRequest;
use App\Models\Post;
use App\Enums\Post\Status as PostStatus;

class Posts extends Controller
{
    public function index()
    {
        return view('posts.index', [ 'posts' => Post::orderByDesc('created_at')->get() ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(SaveRequest $request)
    {
        $data = $request->validated();
        $post = Post::create($data);
        return redirect()->route('posts.show', [ $post->id ]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        // id($post->status !== PostStatus::APPROVED) 404
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        /* var_dump($post->options);
        $post->options = [
            ['title' => 'Weight', 'value' => 100],
            ['title' => 'Height', 'value' => 200]
        ];
        $post->save(); */
        return view('posts.edit', compact('post'));
    }

    public function update(SaveRequest $request, $id)
    {
        $data = $request->validated();
        $post = Post::findOrFail($id);
        $post->update($data);
        return redirect()->route('posts.show', [ $post->id ]);
    }

    public function destroy($id)
    {
        //
    }

    /* public function approve($id){
        $post = Post::findOrFail($id);
        $post->status = PostStatus::APPROVED;
        $post->save();
    } */
}
