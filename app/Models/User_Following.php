<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_Following extends Model
{
    protected $table='follows';

    protected $fillable = [
        'follower_id', 'followee_id',
    ];
    public $timestamps = false;

}
