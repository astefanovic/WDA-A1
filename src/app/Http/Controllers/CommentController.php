<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use App\Comment;
use App\User;
use App\Http\Requests\CommentFormRequest;

class CommentController extends Controller
{
    public function store(CommentFormRequest $request) {
        $allRequest = $request->all();
        //Creates a comment based on the email of the panel it was in
        //and the ticket id, found from the loop on creation in the
        //blade file
        $user = User::where('email', '=', $allRequest['email'])->first();
        $newComment = Comment::create(['text' => $allRequest['text'],
            'user_id' => $user->id,
            'ticket_id' => $allRequest['ticketId']]);
        $newComment->save();

        return redirect()->route('view');
    }

    public function update(Request $request) {
        $allRequest = $request->all();
        //Setting the completed value to 1 (True)
        $ticket = Ticket::where('id', '=', $allRequest['ticketId'])->first();
        $ticket->update(['completed'=>1]);

        return redirect()->route('view');
    }

    public function delete(Request $request) {
        $allRequest = $request->all();
        //Deleting the current ticket
        $ticket = Ticket::where('id', '=', $allRequest['ticketId'])->first();
        $ticket->delete();
        return redirect()->route('view');
    }
}
