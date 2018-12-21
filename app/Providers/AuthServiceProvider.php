<?php

namespace Taskapp\Providers;

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
        'Taskapp\Model' => 'Taskapp\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('check-task', function ($user, $task) {
            return $user->id == $task->user_id;
        });

        Gate::define('check-category', function ($user, $category) {
            return $user->id == $category->user_id;
        });
    }
}
