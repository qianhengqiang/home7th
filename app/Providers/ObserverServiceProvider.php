<?php

namespace App\Providers;

use App\Entities\Building\House;
use App\Entities\Contract\Contract;
use App\Observers\ContractObserver;
use App\Observers\HouseObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        House::observe(HouseObserver::class);
//        Contract::observe(ContractObserver::class);
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
}
