<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\User;
use App\Http\Requests\TicketFormRequest;
use Mockery\Exception;

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
            'staff_id' => null,
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
        try {
            $ticket = Ticket::find($id);
            $ticket->name = $request->name;
            $ticket->details = $request->details;

            $saved = $ticket->save();

            if(!$saved){
                return array("status" => "error");
            }
        }
        catch(Exception $e) {
            return array("status" => "error");
        }

        return array("status" => "success");
    }

    //Deletes ticket with corresponding id
    public function delete($id) {
        try {
            $ticket = Ticket::find($id);
            if($ticket != null) {
                $ticket->delete();
            } else {
                return array("status" => "error");
            }

            return array("status" => "success");
        } catch(Exception $e) {
            return array("status" => "error");
        }

        return array("status" => "success");
    }
}
