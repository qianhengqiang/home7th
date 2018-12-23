<?php

namespace App\Listeners;

use App\Events\BuildingCreateEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class BuildingCreate
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(BuildingCreateEvent $event)
    {
        //
//        $user = Auth(config('system.current_guard'))->user();

//        $user =  Auth::guard(config('system.current_guard'))->user();
//        $user =  auth(config('system.current_guard'))->user();
        $user =  auth()->user();

//        $user = Auth::user();
        $event->building->setUser($user);

    }
}
