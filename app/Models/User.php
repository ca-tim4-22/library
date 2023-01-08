<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    // Added $dates for last_login_at listener
    protected $dates
        = [
            'created_at',
            'updated_at',
            'last_login_at',
        ];

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'email' => $this->username,
        ];
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden
        = [
            'password',
            'remember_token',
            'created_at',
            'updated_at',
            'user_type_id',
            'user_gender_id',
            'email_verified_at',
            'photo',
            'last_login_at',
        ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts
        = [
            'email_verified_at' => 'datetime',
        ];

    public function type()
    {
        return $this->belongsTo(UserType::class, 'user_type_id');
    }

    public function gender()
    {
        return $this->belongsTo(UserGender::class, 'user_gender_id');
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getCount($id)
    {
        return DB::table('users')
                 ->select(DB::raw('count(*) as count'))
                 ->where('user_type_id', $id)
                 ->first()
            ->count;
    }
}
