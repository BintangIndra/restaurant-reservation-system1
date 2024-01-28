<?php
namespace App\Reservation\ValueObjects;

class ReservationStatus
{
    private const PENDING = 'Pending';
    private const CONFIRMED = 'Confirmed';
    private const CANCELLED = 'Cancelled';

    private $status;

    public function __construct(string $status)
    {
        if (!in_array($status, [self::PENDING, self::CONFIRMED, self::CANCELLED])) {
            throw new \InvalidArgumentException('Invalid reservation status');
        }

        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}