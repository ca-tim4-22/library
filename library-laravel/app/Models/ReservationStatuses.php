<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationStatuses extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $timestamps = false;

    public function reservation() {
        return $this->belongsTo(Reservation::class);
    }

    public function status() {
        return $this->belongsTo(StatusReservation::class, 'status_reservations_id');
    }
}
