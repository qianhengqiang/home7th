<?php

namespace App\Providers;

use App\Events\BuildingCreateEvent;
use App\Events\ContractCreateEvent;
use App\Events\ContractUpdateEvent;
use App\Listeners\BuildingCreate;
use App\Listeners\ContractUpdateSpaceChangeListener;
use App\Listeners\ContractUpdateStatusChangeListener;
use App\Listeners\UpdateHouseInfoWhenCreateContract;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        BuildingCreateEvent::class => [
            BuildingCreate::class,
        ],
        ContractCreateEvent::class => [
          UpdateHouseInfoWhenCreateContract::class,
        ],
        ContractUpdateEvent::class => [
            ContractUpdateStatusChangeListener::class,
            ContractUpdateSpaceChangeListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
