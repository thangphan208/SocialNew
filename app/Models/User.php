<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $guard = 'user';

    protected $fillable = [
        'name', 'email', 'password','avatar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function followers()
    {
        return $this->belongsToMany(  self::class, 'follows', 'followee_id', 'follower_id');
    }

    public function followees()
    {
        return $this->belongsToMany( self::class, 'follows',  'follower_id', 'followee_id');
    }
}
