<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'subject', 'type', 'desc', 'status', 'priority', 'escalation', 'completed', 'user_id', 'staff_id'
    ];

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function staff() {
        return $this->belongsTo('App\Staff');
    }
}
