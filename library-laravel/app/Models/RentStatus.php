<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentStatus extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function rent() {
        return $this->belongsTo(Rent::class, 'rent_id');
    }

    public function book_status() {
        return $this->belongsTo(BookStatus::class, 'book_status_id');
    }

    public function condition_1() {
        return $this->book_status()->where('status','=','true');
    }

}


