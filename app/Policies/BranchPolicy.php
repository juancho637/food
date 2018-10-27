<?php

namespace App\Policies;

use App\User;
use App\Branch;
use Illuminate\Auth\Access\HandlesAuthorization;

class BranchPolicy
{
    use HandlesAuthorization;

    public function before(User $authUser)
    {
        if($authUser->isRole('su')){
            return true;
        }
    }

    /**
     * Determine whether the user can view the branch.
     *
     * @param  \App\User  $authUser
     * @param  \App\Branch  $branch
     * @return mixed
     */
    public function view(User $authUser, Branch $branch)
    {
        return $authUser->company_id === $branch->company_id;
    }

    /**
     * Determine whether the user can create branches.
     *
     * @param  \App\User  $authUser
     * @return mixed
     */
    public function create(User $authUser)
    {
        //
    }

    /**
     * Determine whether the user can update the branch.
     *
     * @param  \App\User  $authUser
     * @param  \App\Branch  $branch
     * @return mixed
     */
    public function update(User $authUser, Branch $branch)
    {
        return $authUser->company_id === $branch->company_id;
    }

    /**
     * Determine whether the user can delete the branch.
     *
     * @param  \App\User  $authUser
     * @param  \App\Branch  $branch
     * @return mixed
     */
    public function delete(User $authUser, Branch $branch)
    {
        return $authUser->company_id === $branch->company_id;
    }

    /**
     * Determine whether the user can restore the branch.
     *
     * @param  \App\User  $authUser
     * @param  \App\Branch  $branch
     * @return mixed
     */
    public function restore(User $authUser, Branch $branch)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the branch.
     *
     * @param  \App\User  $authUser
     * @param  \App\Branch  $branch
     * @return mixed
     */
    public function forceDelete(User $authUser, Branch $branch)
    {
        //
    }
}
