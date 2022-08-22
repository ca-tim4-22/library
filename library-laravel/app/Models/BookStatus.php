<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookStatus extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function rent_status() {
        return $this->hasOne(RentStatus::class, 'book_status_id');
    }
}

