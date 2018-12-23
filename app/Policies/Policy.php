<?php

namespace App\Policies;

use App\Models\Auth;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Policy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */

    public function before(Auth $user,$ability)
    {
        if($user->isSuperAdminer())
            return true;
    }
}
