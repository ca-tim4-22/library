<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Author extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [];

    public function toSearchableArray()
    {
        return [
            'NameSurname' => $this->NameSurname,
        ];
    }

    public function getNameSurnameAttribute($value)
    {
        return ucfirst($value);
    }
}
