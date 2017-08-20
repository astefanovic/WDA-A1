<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\User;
use App\Http\Requests\TicketFormRequest;

class TicketController extends Controller
{
    public function store(TicketFormRequest $request) {
        $allRequest = $request->all();

        //Checks if a user already exists, if so links it to ticket
        //if not, makes a new user and links it to ticket
        $matchingUser = User::where('email', '=', $allRequest['email'])->first();
        if ($matchingUser != null) {
            $newUser = $matchingUser;
        } else {
            $newUser = User::create(['email' => $allRequest['email'],
                'fname' => $allRequest['firstname'],
                'lname' => $allRequest['lastname']]);
        }
        $newUser->save();

        $newTicket = Ticket::create(['subject' => $allRequest['subject'],
            'type' => $allRequest['type'],
            'desc' => $allRequest['description'],
            'user_id' => $newUser->id,
            'completed' => false]);
        $newTicket->save();

        return redirect()->route('view');
    }
}
