<?php

namespace App\Http\Controllers;

use App\Enums\Comment\Status as CommentStatus;
use App\Models\Comment;
use App\Models\Video as MVideo;


class Video extends Controller
{
    public function index()
    {
        return view('user.videos.index', ['videos' => MVideo::orderByDesc('created_at')->with('user')->paginate(5)]);
    }

    public function show($slug)
    {
        $video = MVideo::where('slug', $slug)->with(['comments' => Comment::accept(CommentStatus::ACCEPT)])->firstOrFail();
        return view('user.videos.show', compact('video'));
    }

    
}
