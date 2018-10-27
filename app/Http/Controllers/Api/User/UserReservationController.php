<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\ApiController;
use App\Reservation;
use App\User;
use Illuminate\Http\Request;

class UserReservationController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return $this->showAll($user->reservations()->allowed()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->validate($request, [
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'date' => 'required',
        ]);

        return $this->showOne(
            $user->reservations()->create($request->all()),
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @param  \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Reservation $reservation)
    {
        $this->validate($request, [
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'date' => 'required',
        ]);

        $reservation->update($request->all());

        return $this->showOne($reservation, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user, Reservation $reservation)
    {
        $reservation->delete();

        return $this->showOne($reservation);
    }
}
