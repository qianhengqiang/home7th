<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2019/1/21
 * Time: 10:49 AM
 */

namespace App\DomainService;


use App\Entities\Contract\Contract;
use App\Entities\Contract\ContractHouse;
use App\Events\ContractCreateEvent;
use App\Events\ContractUpdateEvent;
use App\Repositories\Contract\ContractRepository;
use Illuminate\Foundation\Application;

class ContractDomainService
{
    public function __construct(Application $app)
    {

        $this->app = $app;

        $this->repository = $this->app->make(ContractRepository::class);

    }

    public function contractCreate($data)
    {
        $contractHouse = $data['contract'];

        unset($data['contract']);

        $contract = $this->repository->create($data);

        $contract->house()->attach($contractHouse);

        event(new ContractCreateEvent($contract));
//        dd($contract->house()->get());
        return $this->repository->with(['house'])->find($contract->id);

    }

    public function contractUpdate($data,$id){

        $houseData = $data['contract'];

        unset($data['house']);

        $contract = $this->repository->update($data,$id);


        $oldHose = ContractHouse::where('contract_id','=',$contract->id)->get();

        $contract->house()->sync($houseData);

        event(new ContractUpdateEvent($contract,$oldHose));

        return $this->repository->with('house')->find($id);


    }

    public function contractDelete($id)
    {
        $contract = Contract::find($id);

        $houses = $contract->house()->get();

        foreach ($houses as $house){
            $house->has_lease_count -= $house->getOriginal('pivot_space');
            $house->contract_all --;
            $house->contract_now --;
            $house->save();
        }

        $contract->delete();
        return '删除成功';
    }
}
