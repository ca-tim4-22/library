<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'book_authors';  

    public function author() {
        return $this->belongsTo(Author::class);
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }   
}
