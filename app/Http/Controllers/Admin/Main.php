<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Comment\Status as CommentStatus;
use App\Enums\Roles\Status as RoleStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Role as RoleRequest;
use App\Models\Comment as MComment;
use App\Models\Role as MRole;
use App\Models\User as MUSer;

class Main extends Controller
{
    public function index() 
    {
        return view('admin.index');
    }

    public function showNewComments()
    {
        return view('admin.comments.index', 
        [
            'comments' => MComment::with('commentable')->where('status', CommentStatus::DEFAULT)->orderByDesc('created_at')->paginate(5),
            'checkCommentsDeclined' => MComment::with('commentable')->where('status',  CommentStatus::DECLINE)->count(),
            'checkCommentsAccepted' => MComment::with('commentable')->where('status',  CommentStatus::ACCEPT)->count(),
        ]);
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

    public function users()
    {
        return view('admin.userRole.index', ['users' => MUser::with('roles')->paginate(10)]);
    }

    public function editRole($id)
    {
        $roles = collect();
        $user = MUser::findOrFail($id);
        $role = MRole::get();
        $role->each( function ($role) use ($roles) {
            $roles->put($role->id, $role->name->text());
        });
        return view('admin.userRole.role-edit', compact('user', 'roles'));
    }

    public function updateRole(RoleRequest $request, $id)
    {
        $user = MUser::findOrFail($id);
        $user->roles()->sync($request['roles']);
        return redirect()->route('users.index');
    }
}
