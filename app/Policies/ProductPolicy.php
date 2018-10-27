<?php

namespace App\Policies;

use App\User;
use App\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function before(User $authUser)
    {
        if($authUser->isRole('su')){
            return true;
        }
    }

    /**
     * Determine whether the user can view the product.
     *
     * @param  \App\User  $authUser
     * @param  \App\Product  $product
     * @return mixed
     */
    public function view(User $authUser, Product $product)
    {
        return $authUser->company_id === $product->branch->company_id;
    }

    /**
     * Determine whether the user can create products.
     *
     * @param  \App\User  $authUser
     * @return mixed
     */
    public function create(User $authUser)
    {
        //
    }

    /**
     * Determine whether the user can update the product.
     *
     * @param  \App\User  $authUser
     * @param  \App\Product  $product
     * @return mixed
     */
    public function update(User $authUser, Product $product)
    {
        return $authUser->company_id === $product->branch->company_id;
    }

    /**
     * Determine whether the user can delete the product.
     *
     * @param  \App\User  $authUser
     * @param  \App\Product  $product
     * @return mixed
     */
    public function delete(User $authUser, Product $product)
    {
        //
    }

    /**
     * Determine whether the user can restore the product.
     *
     * @param  \App\User  $authUser
     * @param  \App\Product  $product
     * @return mixed
     */
    public function restore(User $authUser, Product $product)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the product.
     *
     * @param  \App\User  $authUser
     * @param  \App\Product  $product
     * @return mixed
     */
    public function forceDelete(User $authUser, Product $product)
    {
        //
    }
}
