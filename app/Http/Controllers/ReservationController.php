<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use App\Product;
use App\Reservation;
use App\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:reservations.index')->only('index');
        $this->middleware('permission:reservations.create')->only(['create', 'store']);
        $this->middleware('permission:reservations.show')->only('show');
        $this->middleware('permission:reservations.edit')->only(['edit', 'update']);
        $this->middleware('permission:reservations.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::allowed()->paginate();

        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::allowed()->pluck('name', 'id');
        $branches = Branch::allowed()->pluck('name', 'id');
        $products = Product::allowed()->pluck('name', 'id');
        $users = User::allowed()->pluck('name', 'id');

        return view(
            'admin.reservations.create',
            compact('companies', 'branches', 'products', 'users')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation = Reservation::create($request->all());

        return redirect()->route('reservations.edit', $reservation)->with('flash', 'Reservación creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        return view('admin.reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        $companies = Company::allowed()->pluck('name', 'id');
        $branches = Branch::allowed()->pluck('name', 'id');
        $products = Product::allowed()->pluck('name', 'id');
        $users = User::allowed()->pluck('name', 'id');

        return view(
            'admin.reservations.edit',
            compact('reservation', 'companies', 'branches', 'products', 'users')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update($request->all());

        return redirect()->route('reservations.edit', $reservation)->with('flash', 'Reservación actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return back()->with('flash', 'Reservación eliminada correctamente');
    }
}
