<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/23
 * Time: 6:13 PM
 */

namespace App\DomainService;


use App\Repositories\Building\HouseRepository;
use Illuminate\Foundation\Application;

class HouseDomainService
{
    protected $app;

    protected $repository;

    public function __construct(Application $app)
    {

        $this->app = $app;

        $this->repository = $this->app->make(HouseRepository::class);

    }

}
