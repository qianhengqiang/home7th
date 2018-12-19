<?php

namespace App\Providers;

use App\Services\PermissionService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function registerPermission()
    {
        $this->app->singleton('PermissionRepository',PermissionService::class);
    }
}
