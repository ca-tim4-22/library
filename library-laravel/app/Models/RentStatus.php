<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentStatus extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function rent() {
        return $this->belongsTo(Rent::class);
    }
}
