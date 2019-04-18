<?php

namespace App\Listeners;

use App\Entities\Building\House;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContractUpdateSpaceChangeListener
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
    public function handle($event)
    {
        //
        //oldHouse 是pivot
        $oldHouse = $event->oldHouse;
        $contract = $event->contract;
        foreach ($oldHouse as $h){
            $house = House::find($h->house_id);
            $house->has_lease_count -= $h->space;
            $house->save();
        }

        $newHouse = $contract->house()->get();
        foreach ($newHouse as $h){
            $h->has_lease_count += $h->getOriginal('pivot_space');
            $h->save();
        }

    }
}
