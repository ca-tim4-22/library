<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
