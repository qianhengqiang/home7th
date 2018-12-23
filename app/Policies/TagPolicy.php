<?php

namespace App\Policies;

use App\Entities\Tag;
use App\Models\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy extends Policy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(Auth $user, Tag $tag)
    {
        return $user->id == $tag->user_id;
    }

    public function delete(Auth $user, Tag $tag)
    {
        return $user->id == $tag->user_id;
    }

}
