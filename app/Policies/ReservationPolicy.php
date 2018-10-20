<?php

namespace App\Policies;

use App\User;
use App\Reservation;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReservationPolicy
{
    use HandlesAuthorization;

    public function before(User $authUser)
    {
        if($authUser->isRole('su')){
            return true;
        }
    }

    /**
     * Determine whether the user can view the reservation.
     *
     * @param  \App\User  $authUser
     * @param  \App\Reservation  $reservation
     * @return mixed
     */
    public function view(User $authUser, Reservation $reservation)
    {
        return $authUser->id === $reservation->user->id;
    }

    /**
     * Determine whether the user can create reservations.
     *
     * @param  \App\User  $authUser
     * @return mixed
     */
    public function create(User $authUser)
    {
        //
    }

    /**
     * Determine whether the user can update the reservation.
     *
     * @param  \App\User  $authUser
     * @param  \App\Reservation  $reservation
     * @return mixed
     */
    public function update(User $authUser, Reservation $reservation)
    {
        return $authUser->id === $reservation->user->id;
    }

    /**
     * Determine whether the user can delete the reservation.
     *
     * @param  \App\User  $authUser
     * @param  \App\Reservation  $reservation
     * @return mixed
     */
    public function delete(User $authUser, Reservation $reservation)
    {
        //
    }

    /**
     * Determine whether the user can restore the reservation.
     *
     * @param  \App\User  $authUser
     * @param  \App\Reservation  $reservation
     * @return mixed
     */
    public function restore(User $authUser, Reservation $reservation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the reservation.
     *
     * @param  \App\User  $authUser
     * @param  \App\Reservation  $reservation
     * @return mixed
     */
    public function forceDelete(User $authUser, Reservation $reservation)
    {
        //
    }
}
