<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/13
 * Time: 3:18 AM
 */

namespace App\Services;

use App\Repositories\ManagerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerService
{

    private $guard;

    private $manager;

    private $managerRepository;

    public function __construct($guard)
    {
        $this->guard = $guard;
    }

    public function getManagerListByCondition($data)
    {
        $list = [];

        $class = $this->getManagerClass();

        $this->manager = new $class;

//        $page = isset($data['page']) ? $data['page'] : 1;

//        unset($data['page']);

        $query = $this->manager->newQuery();

        $query->when(isset($data['name']),function ($query)use($data){
            $query->where('name','like','%'.$data['name'].'%');
        });

        $query->with('roles');

        $list = $query->orderBy('created_at','desc')->paginate();
//        $list = $query->orderBy('created_at','desc')->paginate($this->manager->getPerpage);
//        $page = $condition['page'] ?? 1;
//        $tmp = new $c
        return $list;
    }

    public function createManager($data)
    {

        $class = $this->getManagerClass();

        $data['password'] = Hash::make($data['password']);

        $role = $data['roles'];
        unset($data['roles']);

        $this->manager = $class::create($data);

        $this->assignRolesToManager($this->manager->id,$role);

        return $this->manager;
//        return $this->manager = $class::create($data);

    }

    protected function getManagerClass()
    {
        return  config('auth.providers.'.config('auth.guards.'.$this->guard.'.provider').'.model');
    }

    public function setManager($managerId)
    {
        $this->manager = ($this->getManagerClass())::find($managerId);
    }

    public function changePassword($managerId,$password)
    {

        $this->setManager($managerId);
//dd($this->manager);
        $this->managerRepository = new ManagerRepository($this->manager);

        $this->managerRepository->changePassword($password);

        return success_code();

    }

    public function assignRolesToManager($managerId, $roles)
    {

        $this->setManager($managerId);

        $this->managerRepository = new ManagerRepository($this->manager);

        $this->managerRepository->updateRolesToManager(explode(',',$roles));

        return success_code();

    }

    public function deleteManagerById($managerId)
    {
        $this->setManager($managerId);

//        $this->managerRepository = new ManagerRepository($this->manager);
        $this->manager->delete();

        return success_code();
    }

}
