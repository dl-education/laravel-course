<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Comment\Status as CommentStatus;
use App\Http\Controllers\Controller;
use App\Models\Comment as MComment;

class Main extends Controller
{
    public function index() 
    {
        return view('admin.index');
    }

    public function declinedComments()
    {
        $comments = MComment::with('commentable')->where('status',  CommentStatus::DECLINE)->orderByDesc('updated_at')->paginate(5);
        return view('admin.comments.declined', compact('comments'));
    }

    public function acceptedComments()
    {
        $comments = MComment::with('commentable')->where('status',  CommentStatus::ACCEPT)->orderByDesc('updated_at')->paginate(5);
        return view('admin.comments.accepted', compact('comments'));
    }
}
