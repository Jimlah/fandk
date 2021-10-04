<?php

namespace App\Providers;

use App\Models\Branch;
use App\Policies\BranchPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Branch::class => BranchPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-managers', function ($user) {
            return $user->id == 1;
        });

        Gate::define('manage-branches', function ($user) {
            return $user->id == 1;
        });

        Gate::define('manage-customers', function ($user) {
            return $user->manager !== null;
        });

        Gate::define('manage-complaints', function ($user) {
            if ($user->manager !== null) {
                return true;
            }

            return $user->customer !== null;
        });
    }
}
