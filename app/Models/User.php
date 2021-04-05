<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

// Vj8qDgU6gKOFnPqUECtSlz2nOgvurHqpd4TCRgw5
// DTogecFJo6nrfG8c9L9dlSPlIoNbrgUtGHy83CA6

// mBgtKqp7ENrfKoHIqIiua3j5GB5It8ZvdQBDJHAK
// Gskh1ext9zkaBgjQDHaEf0iu7DCFZOTbsgxPO3bK
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
