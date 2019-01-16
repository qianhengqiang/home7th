<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/25
 * Time: 4:31 PM
 */

namespace App\DomainService;


use App\Entities\Renter\CompanyInfo;
use App\Entities\Renter\CompanyKaipiao;
use App\Entities\Renter\Renter;
use App\Repositories\Renter\RenterRepository;
use Illuminate\Foundation\Application;

class RenterDomainService
{
    protected $app;
    protected $repository;
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->repository = $app->make(RenterRepository::class);
    }

    public function createRenter($data)
    {
        $companyInfo = $data['company_info'];
        unset($data['company_info']);

        $kaipiaoInfo = $data['kaipiao_info'];
        unset($data['kaipiao_info']);

        $renter = $this->repository->create($data);

//        $renter = Renter::create($data);
//        $renter = Renter::find(1);
        $renter->companyInfo()->create($companyInfo);

        $renter->kaipiaoInfo()->create($kaipiaoInfo);

        return $this->repository->with(['companyInfo','kaipiaoInfo'])->find($renter->id);
    }

    public function updateRenter($data,$id)
    {
        $companyInfo = $data['company_info'];
        unset($data['company_info']);

        $kaipiaoInfo = $data['kaipiao_info'];
        unset($data['kaipiao_info']);

        $renter = $this->repository->update($data,$id);

        CompanyInfo::updateOrCreate(['renter_id'=>$renter->id],$companyInfo);
        CompanyKaipiao::updateOrCreate(['renter_id'=>$renter->id],$kaipiaoInfo);

        return $this->repository->with(['companyInfo','kaipiaoInfo'])->find($renter->id);

    }

    public function deleteRenter($id)
    {
        $renter = $this->repository->find($id);

        $renter->companyInfo()->delete();
        $renter->kaipiaoInfo()->delete();

        $renter->delete();

        return '删除成功';
    }
}
