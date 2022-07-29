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

    public function student() {
        return $this->belongsTo(User::class);
    }

    public function librarian() {
        return $this->belongsTo(User::class);
    }

    public function reservationStatus() {
        return $this->hasMany(ReservationStatus::class);
    }
}
