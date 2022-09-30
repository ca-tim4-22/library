<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function librarian() {
        return $this->belongsTo(User::class, 'rent_user_id');
    }

    public function borrow() {
        return $this->belongsTo(User::class, 'borrow_user_id');
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }

    public function rent_status() {
        return $this->hasMany(RentStatus::class, 'rent_id');
    }

    public function rek() {
        return $this->hasMany(RentStatus::class, 'rent_id')->where('id', 1);
    }
}
