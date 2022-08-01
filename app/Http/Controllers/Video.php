<?php

namespace App\Http\Controllers;

use App\Enums\Comment\Status as CommentStatus;
use App\Models\Video as MVideo;


class Video extends Controller
{
    public function index()
    {
        return view('user.videos.index', ['videos' => MVideo::orderByDesc('created_at')->paginate(5)]);
    }

    public function show($slug)
    {
        $video = MVideo::where('slug', $slug)->with(['comments' => function($query) {
            $query->where('status', CommentStatus::ACCEPT);
        }])->firstOrFail();
        return view('user.videos.show', compact('video'));
    }

    
}
