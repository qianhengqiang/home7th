<?php

namespace App\Listeners;

use App\Entities\Contract\Contract;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContractUpdateStatusChangeListener
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

        $changes = $contract->getChanges();

        if(isset($changes['sataus'])){

            //作废的合同
            if($changes['status'] == Contract::ZUOFEI){
                //对应的房间管理面积
                $houses = $contract->house()->get();
                foreach ($houses as $house){
//                    $house->contract_now--;

                }
            }
        }
    }
}
