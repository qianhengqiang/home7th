<?php

namespace App\Providers;

use App\Entities\Building\BuildingDomainService;
use Illuminate\Support\ServiceProvider;

class DomianServiceServiceProvider extends ServiceProvider
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
        $this->app->bind(BuildingDomainService::class, function(){
            return new BuildingDomainService();
        });
    }
}
