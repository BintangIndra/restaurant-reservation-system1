<?php
namespace App\Reservation\Repositories;

use App\Models\Reservation;

interface ReservationRepositoryInterface
{
    public function findById(int $id): ?Reservation;
    public function save(Reservation $reservation): void;
}