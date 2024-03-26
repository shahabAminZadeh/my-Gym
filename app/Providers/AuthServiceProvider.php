<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
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
     */
    public function boot(): void
    {

        \Illuminate\Support\Facades\Gate::define('schedule_class',function (User $user)
        {
           return $user-> role === 'instructor';
        });

        \Illuminate\Support\Facades\Gate::define('book_class',function (User $user)
        {
            return $user-> role === 'member';
        });
    }
}
