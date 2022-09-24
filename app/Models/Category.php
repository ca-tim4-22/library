<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Category extends Model
{
    use HasFactory, Searchable;
    protected $guarded = [];
    public $timestamps = false;

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
        ];
    }
}
