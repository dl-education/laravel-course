<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Posts\Save as SaveRequest;
use App\Models\Post as MPost;
use App\Enums\Post\Status as PostStatus;
use App\Http\Controllers\Controller;
use App\Models\Category as MCategory;
use App\Models\Tag as MTag;

class Posts extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [ 
            'posts' => MPost::orderByDesc('created_at')->paginate(5),
        ]);
    }

    public function create()
    {
        $categories = MCategory::pluck('name','id');
        $tags = MTag::orderByDesc('title')->pluck('title','id');
        return view('admin.posts.create', compact('categories','tags'));
    }

    public function store(SaveRequest $request)
    {
        $data = $request->validated();
        $post = MPost::create($data);
        $post->tags()->sync($data['tags']);
        return redirect()->route('posts.show', [ $post->id ]);
    }

    public function show($id)
    {
        $post = MPost::with('comments')->findOrFail($id);
        // id($post->status !== PostStatus::APPROVED) 404
        return view('admin.posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = MPost::findOrFail($id);
        $categories = MCategory::pluck('name','id');
        $tags = MTag::orderByDesc('title')->pluck('title','id');
        /* var_dump($post->options);
        $post->options = [
            ['title' => 'Weight', 'value' => 100],
            ['title' => 'Height', 'value' => 200]
        ];
        $post->save(); */
        return view('admin.posts.edit', compact('post','categories','tags'));
    }

    public function update(SaveRequest $request, $id)
    {
        $data = $request->validated();
        $post = MPost::findOrFail($id);
        $post->update($data);
        $post->tags()->sync($data['tags']);
        return redirect()->route('posts.show', [ $post->id ]);
    }

    public function destroy($id)
    {
        MPost::findOrFail($id)->delete();
        return redirect()->route('posts.index');
    }

    public function approve($id)
    {
        $post = MPost::findOrFail($id);
        $post->status = PostStatus::APPROVED;
        $post->save();
        return redirect()->route('posts.index')->with('notification', 'post.approved');
    } 

    public function rejected($id)
    {
        $post = MPost::findOrFail($id);
        $post->status = PostStatus::REJECTED;
        $post->save();
        return redirect()->route('posts.index')->with('notification', 'post.rejected');
    } 
}
