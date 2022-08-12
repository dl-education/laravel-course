<?php

namespace App\Http\Controllers;

use App\Enums\Comment\Status as CommentStatus;
use App\Enums\Post\Status as PostStatus;
use App\Models\Comment;
use App\Models\Post as MPost;
use App\Models\Tag as MTag;

class Posts extends Controller
{
    public function index()
    {
        return view('user.posts.index', ['posts' => MPost::where('status', PostStatus::APPROVED)->withCount('comments')->orderByDesc('created_at')->paginate(5)]);
    }

    public function show($slug)
    {
        $post = MPost::where('slug', $slug)->with(['comments' => Comment::accept(CommentStatus::ACCEPT)])->firstOrFail();
        return view('user.posts.show', compact('post'));
    }

    public function showPostsForTag($url)
    {
        $tag = MTag::where('url', $url)->with('posts')->firstOrFail();
        return view('user.tags.show', compact('tag'));
    }

    public function showTags()
    {
        $tags = MTag::paginate(5);
        return view('user.tags.index', compact('tags'));
    }
}
