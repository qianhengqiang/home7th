<?php

namespace App\Observers;

use App\Entities\Building\Building;
use App\Entities\Building\Floor;
use App\Entities\Building\House;

class HouseObserver
{
    //
    public function created(House $house)
    {
        $building = Building::find($house->building_id);
        $floor = Floor::find($house->floor_id);
        $building->addHouse($house);
        $floor->addHouse($house);
        $building->save();
        $floor->save();
    }

    public function updated(House $house)
    {
        $building = Building::find($house->building_id);
        $floor = Floor::find($house->floor_id);

        $building->updateHouse($house);
        $floor->updateHouse($house);

        $building->save();
        $floor->save();
    }

    public function deleted(House $house)
    {
        $building = Building::find($house->building_id);
        $floor = Floor::find($house->floor_id);

        $building->deleteHouse($house);
        $floor->deleteHouse($house);

        $building->save();
        $floor->save();
    }
}
