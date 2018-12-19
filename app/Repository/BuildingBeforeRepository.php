<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/17
 * Time: 10:57 PM
 */

namespace App\Repository;


use App\Domain\BuildingDomain\BuildingAggregate;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class BuildingBeforeRepository
{

    public function save(BuildingAggregate $build)
    {
//        Cache::flush();
//        Cache::tags(BuildingAggregate::class)->add($build->getId(),$build,20);

        Redis::hsetnx(BuildingAggregate::class,$build->getId(),serialize($build));
    }

    public function getById($id)
    {
//        return 'aaa';
//        Cache::flush();
//        return Cache::get($id);
//        return unserialize(Redis::get($id));
//        return Cache::(BuildingAggregate::class)->get($id);
        return unserialize(Redis::hget(BuildingAggregate::class,$id));
    }

    public function all()
    {
        $list = Redis::hvals(BuildingAggregate::class);
        foreach ($list as $k=>$v){
            $list[$k] = unserialize($v);
        }
        return $list;
    }
}
