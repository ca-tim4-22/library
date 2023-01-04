<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rent()
    {
        return $this->belongsTo(Rent::class, 'rent_id');
    }

    public function book_status()
    {
        return $this->belongsTo(BookStatus::class, 'book_status_id');
    }
}


