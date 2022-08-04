<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\Save as SaveRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Enums\Post\Status as PostStatus;

class Posts extends Controller
{
    public function index()
    {
        return view('posts.index', [ 
            'posts' => Post::withCount('comments')->orderByDesc('created_at')->get()
        ]);
    }

    public function create()
    {
        return view('posts.create', [
            'tags' => Tag::orderByDesc('title')->pluck('title', 'id')
        ]);
    }

    public function store(SaveRequest $request)
    {
        $data = $request->validated();
        $post = Post::create($data);
        $post->tags()->sync($data['tags']);
        return redirect()->route('posts.show', [ $post->id ]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $tags = Tag::orderByDesc('title')->pluck('title', 'id');
        return view('posts.edit', compact('post', 'tags'));
    }

    public function update(SaveRequest $request, $id)
    {
        $data = $request->validated();
        $post = Post::findOrFail($id);
        $post->update($data);
        $post->tags()->sync($data['tags']);
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
