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

    public function __construct(Request $request)
    {

        $this->guard = $request->header('guard','adminer');

        $this->middleware('auth:'.$this->guard, ['except' => ['login']]);

    }

}
