<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    const ADMIN_USER = 'admin';
    const MEMBER_USER = 'member';

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

    /**
     * 會員與動物資源的關聯
     */
    public function animals()
    {
        return $this->hasMany('App\Models\Animal', 'user_id', 'id');
    }

    /**
     * 多對多關聯 animal 與 user 我的最愛關係
     */
    public function likes()
    {
        return $this->belongsToMany('App\Models\Animal', 'animal_user_likes')->withTimestamps();
    }

    public function isAdmin()
    {
        return $this->permission === User::ADMIN_USER;
    }
}
