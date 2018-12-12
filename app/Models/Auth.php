<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PhpParser\Builder;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

abstract class Auth extends Authenticatable implements JWTSubject
{
    //
    use Notifiable,HasRoles;
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'guard' => $this->guard_name,
        ];
    }

    public function getGuardName()
    {
        return $this->getGuardNames();
    }

    public function fetchByCondition($condition)
    {
    }
}
