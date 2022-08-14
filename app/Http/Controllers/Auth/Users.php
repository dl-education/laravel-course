<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Save as SaveRequest;
use App\Models\User;
use App\Models\Role;

class Users extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('created_at')->paginate(3);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create', [
            'roles' => Role::orderByDesc('name')->pluck('name', 'id')
        ]);
    }

    public function store(SaveRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        $user->roles()->sync($data['roles']);
        return redirect()->route('users.show', [ $user->id ]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::orderByDesc('name')->pluck('name', 'id');
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(SaveRequest $request, $id)
    {
        $data = $request->validated();
        $user = User::findOrFail($id);
        $user->update($data);
        $user->roles()->sync($data['roles']);
        return redirect()->route('users.show', [ $user->id ]);
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
