<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    // use HasApiTokens;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_role ', 'points', 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function tickets()
    {
        return $this->hasMany(ticket::class, 'madeBy');
    }
    public function comments()
    {
        return $this->hasMany(comment::class, 'userId');
    }
}
