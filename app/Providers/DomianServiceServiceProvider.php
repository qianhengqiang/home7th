<?php

namespace App\Providers;

use App\DomainService\BuildingDomainService;
use App\DomainService\HouseDomainService;
use App\DomainService\TagsDomainService;
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
        $this->app->bind(BuildingDomainService::class, function($app){
            return new BuildingDomainService($app);
        });

        $this->app->bind(TagsDomainService::class, function($app){
            return new TagsDomainService($app);
        });

        $this->app->bind(HouseDomainService::class, function($app){
            return new HouseDomainService($app);
        });
    }
}
