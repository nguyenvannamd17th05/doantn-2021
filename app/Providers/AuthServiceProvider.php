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

        Gate::define('contact',function ($user){
           return $user->checkPermission('contact');
        });
        Gate::define('product',function ($user){
            return $user->checkPermission('product');
        });
        Gate::define('user',function ($user){
            return $user->checkPermission('user');
        });
        Gate::define('employee',function ($user){
            return $user->checkPermission('employee');
        });
        Gate::define('category',function ($user){
            return $user->checkPermission('category');
        });
        Gate::define('article',function ($user){
            return $user->checkPermission('article');
        });
        Gate::define('transaction',function ($user){
            return $user->checkPermission('transaction');
        });
        Gate::define('permission',function ($user){
            return $user->checkPermission('permission');
        });
        Gate::define('rating',function ($user){
            return $user->checkPermission('rating');
        });

    }
}
