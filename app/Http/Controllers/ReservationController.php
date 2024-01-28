<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorereservationRequest;
use App\Http\Requests\UpdatereservationRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorereservationRequest $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'table_id' => 'required|exists:tables,id',
            'date' => 'required|date',
        ]);

        $data = [
            'user_id' => $request->input('user_id'),
            'table_id' => $request->input('table_id'),
            'date' => $request->input('date'),
            'status' => 'Pending', 
        ];

        $reservation = $this->reservationService->createReservation($data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);

        return $reservation;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatereservationRequest $request, reservation $reservation)
    {
        $request->validate([
            'date' => 'required|date',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $reservation = Reservation::findOrFail($id);

        $reservation->update([
            'date' => $request->input('date'),
            'status' => $request->input('status'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reservation $reservation)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
    }
}
