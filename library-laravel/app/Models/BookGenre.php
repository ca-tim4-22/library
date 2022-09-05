<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookGenre extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $timestamps = false;

    public function genre() {
        return $this->belongsTo(Genre::class);
    }
}
