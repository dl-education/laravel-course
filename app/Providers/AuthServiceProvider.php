<?php

namespace App\Providers;

use App\Http\Controllers\Posts;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Posts::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Password::defaults(function () {
            $rule = Password::min(4);

            return $this->app->isProduction()
                ? $rule->min(8)->mixedCase()->uncompromised()
                : $rule;
        });

        Gate::define('admin-tags', function($user){
            return $user->roles()->where('name', 'admin')->count() > 0;
        });

        Gate::define('admin-users', function($user){
            return $user->roles()->where('name', 'admin')->count() > 0;
        });
    }
}
