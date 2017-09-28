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

        session()->flash('msg', 'Your ticket has been created.');

        return redirect()->route('view');
    }

    //API functions
    //Returns all tickets
    public function index() {
        return Ticket::all();
    }

    //Returns ticket requested
    public function show($id) {
        return Ticket::find($id);
    }

    /*
     * Other store method needs to be removed or function name changed before this is implemented
    //Stores a new ticket
    public function store(Request $request) {
        return Ticket::create($request->all());
    }
    */

    //Updates ticket with corresponding id
    public function update(Request $request, $id) {

    }

    //Deletes ticket with corresponding id
    public function delete(Request $request, $id) {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return 204;
    }
}
