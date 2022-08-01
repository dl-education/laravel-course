<?php

namespace App\Http\Controllers;

use App\Enums\Comment\Status as CommentStatus;
use App\Http\Requests\Comments\Store as StoreRequest;
use App\Http\Requests\Comments\Update as UpdateRequest;

use App\Models\Post as MPost;
use App\Models\Video as MVideo;
use App\Models\Comment as MComment;

class Comments extends Controller
{
    const FOR_MODELS = [
        'post' => MPost::class,
        'video' => MVideo::class
    ];

    const MODEL_REDIRECT = [
        MPost::class => 'posts.show',
        MVideo::class => 'video.show'
    ];

    public function index()
    {
        return view('admin.comments.index', 
        [
            'comments' => MComment::with('commentable')->where('status', CommentStatus::DEFAULT)->orderByDesc('created_at')->paginate(5),
            'checkCommentsDeclined' => MComment::with('commentable')->where('status',  CommentStatus::DECLINE)->count(),
            'checkCommentsAccepted' => MComment::with('commentable')->where('status',  CommentStatus::ACCEPT)->count(),
        ]);
    }

    public function store(StoreRequest $request)
    {
        $modelName = self::FOR_MODELS[$request->for];
        $model = $modelName::findOrFail($request->id);
        $model->comments()->create($request->only(['text']));
        return back();
    }

    public function edit($id)
    {
        $comment = MComment::findOrFail($id);
        return view('comments.edit', compact('comment'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $comment = MComment::findOrFail($id);
        $comment->update($request->validated());
        session()->flash('notification','comments.updated');
        return redirect()->route(self::MODEL_REDIRECT[$comment->commentable_type], [$comment->commentable_id]);
    }

    public function destroy($id)
    {
        MComment::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function acceptComment($id)
    {
        $comment = Mcomment::findOrfail($id);
        $comment->status = CommentStatus::ACCEPT;
        $comment->save();
        return redirect()->back();
    }
    
    public function declineComment($id)
    {
        $comment = Mcomment::findOrfail($id);
        $comment->status = CommentStatus::DECLINE;
        $comment->save();
        return redirect()->back();
    }

}
