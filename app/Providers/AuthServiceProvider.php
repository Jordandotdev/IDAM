<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Enums\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('HighAuth_Gate', function ($user) {
            return $user->roles->pluck('id')->contains(1) || $user->roles->pluck('id')->contains(2);
        });

        Gate::define('Admin_Gate', function ($user) {
            return $user->roles->pluck('id')->contains(2);
        });

        Gate::define('SuperAdmin_Gate', function ($user) {
            return $user->roles->pluck('id')->contains(1);
        });

    }
}
