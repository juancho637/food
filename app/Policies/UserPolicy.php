<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    public function before(User $authUser)
    {
        if($authUser->isRole('su')){
            return true;
        }
    }
    
    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $authUser
     * @param  \App\User  $user
     * @return mixed
     */
    public function view(User $authUser, User $user)
    {
        if ($authUser->isRole('admin') && $authUser->company_id === $user->company_id)
        {
            return true;
        }

        return $authUser->id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $authUser
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $authUser, User $user)
    {
        if ($authUser->isRole('admin') && $authUser->company_id === $user->company_id)
        {
            return true;
        }

        return $authUser->id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $authUser
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $authUser, User $user)
    {
        if ($authUser->isRole('admin') && $authUser->company_id === $user->company_id)
        {
            return true;
        }

        return $authUser->id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $authUser
     * @param  \App\User  $user
     * @return mixed
     */
    public function restore(User $authUser, User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $authUser
     * @param  \App\User  $user
     * @return mixed
     */
    public function forceDelete(User $authUser, User $user)
    {
        //
    }
}
