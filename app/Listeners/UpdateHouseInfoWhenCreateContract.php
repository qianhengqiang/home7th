<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateHouseInfoWhenCreateContract
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
        $contract = $event->contract;

        $tmp = $contract->house()->count();
//dd($contract);
        if($tmp>0){
            $houses = $contract->house;

            foreach ($houses as $house){
//                $house = House::find($h->house_id);
//                dd($house);
//                if(!$house)
//                    continue;
                $house->contract_all++;
                $house->contract_now++;
                $house->has_lease_count += $house->getOriginal('pivot_space');
                $house->save();

            }
        }

    }
}
