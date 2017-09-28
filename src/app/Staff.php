<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'email', 'fname', 'lname', 'type'
    ];

    //Each staff member can be assigned to many tickets
    public function tickets() {
        return $this->hasMany('App\Ticket');
    }

    //Each staff member can post multiple comments
    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
