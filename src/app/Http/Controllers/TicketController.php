<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\User;

class TicketController extends Controller
{
    public function store(Request $request) {
        $allRequest = $request->all();

        $matchingUser = User::where('email', '=', $allRequest['email'])->first();
        if ($matchingUser->count()) {
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
