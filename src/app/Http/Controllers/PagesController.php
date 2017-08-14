<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\User;

class PagesController extends Controller
{
    public function ticket() {
        $ticket = new Ticket;
        return view('ticket', ['ticket' => $ticket]);
    }

    public function view() {
        $completed = Ticket::where('completed', '=',1)->get();
        $uncompleted = Ticket::where('completed', '=',0)->get();
        //Array of ([0] => email@email.com) to (email@email.com => email@email.com) to be used in selectbox
        $emails = User::pluck('email') -> toArray();
        return view('view', [ 'completed' => $completed, 'uncompleted' => $uncompleted, 'emails' => array_combine($emails, $emails)]);
    }
}
