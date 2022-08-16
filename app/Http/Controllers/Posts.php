<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\Save as SaveRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Enums\Post\Status as PostStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class Posts extends Controller
{
    public function index()
    {
        $posts = Post::withCount('comments')->orderByDesc('created_at')->paginate(3);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $this->authorize('create', self::class);

        return view('posts.create', [
            'tags' => Tag::orderByDesc('title')->pluck('title', 'id')
        ]);
    }

    public function store(SaveRequest $request)
    {
        $this->authorize('create', self::class);

        $data = $request->validated();
        $post = $request->user()->posts()->create($data);
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

        $this->authorize('update', [$post]);

        $tags = Tag::orderByDesc('title')->pluck('title', 'id');
        return view('posts.edit', compact('post', 'tags'));
    }

    public function update(SaveRequest $request, $id)
    {
        $data = $request->validated();
        $post = Post::findOrFail($id);

        $this->authorize('update', [$post]);
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
