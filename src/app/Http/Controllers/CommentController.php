<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CommentFormRequest;

class CommentController extends Controller
{
    public function store(CommentFormRequest $request) {
        $allRequest = $request->all();
        //Creates a comment based on the email of the panel it was in
        //and the ticket id, found from the loop on creation in the
        //blade file
        /*
        if($request->has('status')){
            $ticket = Ticket::findOrFail($allRequest['ticketId']);
            if(Ticket::where('completed', '=', '1'))
            {
                $ticket->completed = 'true';
                $ticket->update($request);
            }
        } */

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

}
