<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    //
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $guard;

//    public function __construct(Request $request)
    public function __construct()
    {

        $this->guard = request()->header('guard',config('system.default_guard'));

        $this->middleware('auth:'.$this->guard, ['except' => ['login']]);

    }

}
