<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\User;
use App\Http\Requests\TicketFormRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Mockery\Exception;

class TicketController extends Controller
{
    public function store(TicketFormRequest $request) {
        $allRequest = $request->all();

        //Checks if a user already exists, if so links it to ticket
        //if not, makes a new user and links it to ticket
        /*
        $matchingUser = User::where('email', '=', $allRequest['email'])->first();
        if ($matchingUser != null) {
            $newUser = $matchingUser;
        } else {
            $newUser = User::create(['email' => $allRequest['email'],
                'fname' => $allRequest['firstname'],
                'lname' => $allRequest['lastname']]);
        }
        $newUser->save(); */

        //Adds a new ticket, selecting the user based on the id passed in,
        //with no staff member assigned
        $newTicket = Ticket::create(['subject' => $allRequest['subject'],
            'type' => $allRequest['type'],
            'desc' => $allRequest['description'],
            'status' => 'pending',
            'escalation' => '1',
            'priority' => 'low',
            'user_id' => $allRequest['userId'],
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

    //Stores a new ticket
    public function insert(Request $request) {
        try {
            $newTicket = Ticket::create(['subject' => $request->input('subject'),
                'type' => $request->input('type'),
                'desc' => $request->input('desc'),
                'user_id' => $request->input('user_id'),
                'staff_id' => null,
                'completed' => false]);
            if($newTicket->save()) return $newTicket;
            throw new HttpException(400, "Invalid data");
        } catch (\Exception $e) {
            return array("status" => "error");
        }
        //return Ticket::create($request->all());
    }

    //Updates ticket with corresponding id
    public function update(Request $request) {
        try {
            $ticket = Ticket::where('id', '=', $request->input('id'))->first();

            $ticket->subject = $request->input('subject');
            $ticket->status = $request->input('status');
            $ticket->desc = $request->input('desc');
            $ticket->escalation = $request->input('escalation');
            $ticket->priority = $request->input('priority');
            $ticket->user_id = $request->input('user_id');
            $ticket->staff_id = $request->input('staff_id');
            $ticket->completed = $request->input('completed');

            if($ticket->save()) return $ticket;
            throw new HttpException(400, "Invalid data");
        }
        catch(\Exception $e) {
            return array("status" => "error");
        }
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
        } catch(\Exception $e) {
            return array("status" => "error");
        }

        return array("status" => "success");
    }
}
