<?php
namespace App\Reservation\Services;

use App\Models\Reservation;
use App\Repositories\ReservationRepositoryInterface;

class ReservationService
{
    private $reservationRepository;

    public function __construct(ReservationRepositoryInterface $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    public function createReservation(array $data): Reservation
    {
        // Your business logic for creating a reservation
        $reservation = new Reservation($data);
        $this->reservationRepository->save($reservation);

        return $reservation;
    }
}