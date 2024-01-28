<?php
namespace App\Reservation\Repositories;

use App\Models\Reservation;

class EloquentReservationRepository implements ReservationRepositoryInterface
{
    public function findById(int $id): ?Reservation
    {
        return Reservation::find($id);
    }

    public function save(Reservation $reservation): void
    {
        $reservation->save();
    }
}