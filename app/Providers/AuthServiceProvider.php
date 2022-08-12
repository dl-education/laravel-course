<?php

namespace App\Providers;

use App\Enums\Roles\Status as RoleStatus;
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

        Gate::define('admin', function($user){
            return !$user->roles()->where('name', RoleStatus::USER)->count();
        });

        Gate::define('admin-main', function($user){
            return $user->roles()->where('name', RoleStatus::ADMIN)->count() > 0;
        });

        Gate::define('admin-moderator', function($user){
            return $user->roles()->where('name', RoleStatus::MODER)->count() > 0;
        });

        Gate::define('admin-writer', function($user){
            return $user->roles()->where('name', RoleStatus::WRITER)->count() > 0;
        });

        
    }
}
