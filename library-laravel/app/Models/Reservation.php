<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function book() {
        return $this->belongsTo(Book::class);
    }

    public function made_for() {
        return $this->belongsTo(User::class, 'reservationMadeFor_user_id');
    }

    public function made_by() {
        return $this->belongsTo(User::class, 'reservationMadeBy_user_id');
    }

    public function closed_by() {
        return $this->belongsTo(User::class, 'closeReservation_user_id');
    }

    public function reservations() {
        return $this->hasMany(ReservationStatuses::class, 'reservation_id');
    }
}
