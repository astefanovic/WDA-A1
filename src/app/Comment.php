<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'text', 'user_id', 'ticket_id', 'staff_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function staff() {
        return $this->belongsTo('App\Staff');
    }

    public function ticket() {
        return $this->belongsTo('App\Ticket');
    }
}
