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

        //Autorization Gates

        Gate::define('HighAuth_Gate', function ($user) {
            return $user->roles->pluck('id')->contains(1) || $user->roles->pluck('id')->contains(2);
        });

        Gate::define('MiddleAuth_Gate', function ($user) {
            return $user->roles->pluck('id')->contains(1) || $user->roles->pluck('id')->contains(2)
             || $user->roles->pluck('id')->contains(3) || $user->roles->pluck('id')->contains(4);
        });

        //Specific Gates including superAdmin and Admin

        Gate::define('Admin_Gate', function ($user) {
            return $user->roles->pluck('id')->contains(2);
        });

        Gate::define('SuperAdmin_Gate', function ($user) {
            return $user->roles->pluck('id')->contains(1);
        });

        Gate::define('HighpropOwner_Gate', function ($user) {
            return $user->roles->pluck('id')->contains(4) ||
             $user->roles->pluck('id')->contains(1) || $user->roles->pluck('id')->contains(2);
        });

        Gate::define('HighCustomer_Gate', function ($user) {
            return $user->roles->pluck('id')->contains(3) ||
             $user->roles->pluck('id')->contains(1) || $user->roles->pluck('id')->contains(2);
        });

        //Specific Gates 

        Gate::define('propOwner_Gate', function ($user) {
            return $user->roles->pluck('id')->contains(4);
        });

        Gate::define('Customer_Gate', function ($user) {
            return $user->roles->pluck('id')->contains(3);
        });
        
    }
}
