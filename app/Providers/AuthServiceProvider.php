<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-tags', function($user){
            return $user->roles()->where('name', 'admin')->count() > 0;
        });

        Gate::define('admin-users', function($user){
            return $user->roles()->where('name', 'admin')->count() > 0;
        });

        Gate::define('posts-create', function($user){
            return $user->roles()->where('name', 'writer')->count() > 0;
        });

        Gate::define('posts-edit', function($user, Post $post){
            return Gate::allows('posts-create') && $user->id === $post->user_id;
        });
    }
}
