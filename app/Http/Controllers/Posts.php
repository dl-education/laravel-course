<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\Save as SaveRequest;
use App\Http\Requests\Posts\Update as UpdateRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Enums\Post\Status as PostStatus;
use Illuminate\Support\Facades\Gate;

class Posts extends Controller
{
    public function __construct() {
        $this->authorizeResource(Post::class, 'post');
    }

    public function index()
    {
        $posts = Post::withCount('comments')->orderByDesc('created_at')->paginate(3);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create', [
            'tags' => Tag::orderByDesc('title')->pluck('title', 'id')
        ]);
    }

    public function show(Post $post)
    // public function show($id)
    {
        // $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function store(SaveRequest $request)
    {
        $data = $request->validated();
        $data = [...$data, 'user_id' => $request->user()->id];
        $post = Post::create($data);
        $post->tags()->sync($data['tags']);
        return redirect()->route('posts.show', [ $post->id ]);
    }

    public function edit(Post $post)
    // public function edit($id)
    {
        // if (!(Gate::allows('admin') or Gate::allows('moderator') or auth()->user()->id == Post::findOrFail($id)->user_id)){
        //     abort(403);
        // }
        $tags = Tag::orderByDesc('title')->pluck('title', 'id');
        return view('posts.edit', compact('post', 'tags'));
    }

    // public function update(UpdateRequest $request, $id)
    /**
 * Обновить конкретный пост.
 *
 * @param  \Illuminate\Http\Request $request
 * @param  \App\Models\Post  $post
 * @return \Illuminate\Http\Response
 *
 * @throws \Illuminate\Auth\Access\AuthorizationException
 */
public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
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
