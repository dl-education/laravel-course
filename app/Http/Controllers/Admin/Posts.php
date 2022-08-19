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
            'posts' => MPost::orderByDesc('created_at')->with('user')->paginate(5),
            'newPosts' => MPost::where('status', PostStatus::DRAFT)->with('user')->orderByDesc('created_at')->get(),
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
        $data = $request->validated() + [ 'user_id' => auth()->id() ];
        $post = MPost::create($data);
        $post->tags()->sync($data['tags']);
        return redirect()->route('posts.show', [ $post->id ]);
    }

    public function show($id)
    {
        $post = MPost::with('comments')->findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    public function edit($id)
    {
        $this->authorize('edit', MPost::findOrfail($id));
        $post = MPost::findOrFail($id);
        $categories = MCategory::pluck('name','id');
        $tags = MTag::orderByDesc('title')->pluck('title','id');
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

    public function reject($id)
    {
        $post = MPost::findOrFail($id);
        $post->status = PostStatus::REJECTED;
        $post->save();
        return redirect()->route('posts.index')->with('notification', 'post.rejected');
    } 
}
