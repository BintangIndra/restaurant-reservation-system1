<?php
namespace App\ValueObjects;

class ReservationDate
{
    private $date;

    public function __construct(\DateTimeImmutable $date)
    {
        $this->date = $date;
    }

    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }
}