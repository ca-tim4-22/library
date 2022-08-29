<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function reservations() {
        return $this->hasMany(Reservation::class);
    }

    public function authors() {
        return $this->hasMany(BookAuthor::class);
    }

    public function genres() {
        return $this->hasMany(BookGenre::class);
    }

    public function categories() {
        return $this->hasMany(BookCategory::class);
    }

    public function letter() {
        return $this->belongsTo(Letter::class);
    }

    public function language() {
        return $this->belongsTo(Language::class);
    }

    public function binding() {
        return $this->belongsTo(Binding::class);
    }

    public function format() {
        return $this->belongsTo(Format::class);
    }

    public function publisher() {
        return $this->belongsTo(Publisher::class);
    }

    public function rent(){
        return $this->hasMany(Rent::class);
    }

    public function gallery(){
        return $this->hasOne(Gallery::class);
    }
}
