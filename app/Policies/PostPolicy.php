<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class PostPolicy
{
    use HandlesAuthorization;

    public function edit(User $user, Post $post)
    {
        return $user->id == $post->user_id || Gate::check('admin-moderator');
    }

    public function update(User $user, Post $post)
    {
        return $user->id == $post->user_id || Gate::check('admin-moderator');
    }

}
