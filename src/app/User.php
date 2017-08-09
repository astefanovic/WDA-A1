<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'email', 'fname', 'lname'
    ];

    public function tickets() {
        return $this->hasMany('App\Ticket');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
