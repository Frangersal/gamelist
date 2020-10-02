<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // >>>--- Permisos ---<<< //
        
        Gate::define(
            'admin-users', function($user){
            return $user->hasRole('admin');
        });

        Gate::define(
            'user-users', function($user){
            return $user->hasRole('user');
        });

    }
}
