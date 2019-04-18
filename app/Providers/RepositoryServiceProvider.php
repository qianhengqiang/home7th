<?php

namespace App\Providers;

use App\Repositories\Building\BuildingRepository;
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
//        $this->app->build(BuildingRepository::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\Building\BuildingRepository::class, \App\Repositories\Building\BuildingRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Building\FloorRepository::class, \App\Repositories\Building\FloorRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Building\ContractRepository::class, \App\Repositories\Building\ContractRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Building\PropertyRepository::class, \App\Repositories\Building\PropertyRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TagRepository::class, \App\Repositories\TagRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Building\HouseRepository::class, \App\Repositories\Building\HouseRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Renter\RenterRepository::class, \App\Repositories\Renter\RenterRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contract\ContractRepository::class, \App\Repositories\Contract\ContractRepositoryEloquent::class);
    }
}
