<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'email', 'fname', 'lname', 'password'
    ];

    protected $hidden = [
        'remember_token'
    ];

    public function tickets() {
        return $this->hasMany('App\Ticket');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
