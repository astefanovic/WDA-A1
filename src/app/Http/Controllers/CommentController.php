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
        //$user = User::where('email', '=', $allRequest['email'])->first();
        $newComment = Comment::create(['text' => $allRequest['text'],
            'user_id' => $allRequest['userId'],
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

    //API functions

    //Lists all comments
    public function index() {
        //First getting all comments
        $comments = Comment::all();
        foreach($comments as $comment) {
            if($comment->user_id != null) {
                $comment->email = Comment::where('id', '=',$comment->id)->first()->user->email;
            } else {
                $comment->email = Comment::where('id', '=',$comment->id)->first()->staff->email;
            }
        }

        /*Next, adding the authors email either user or staff
        $comments = $comments->join('user', 'user_id', '=', 'id')->select('email');
        $comments= $comments->join('staff', 'staff_id', '=', 'id')->select('email'); */
        return $comments;
    }

    //Adds a new comment
    public function insert(Request $request) {
        try {
            $newComment = Comment::create([
                'text' => $request->input('text'),
                'ticket_id' => $request->input('ticket_id'),
                'user_id' => $request->input('user_id'),
                'staff_id' => $request->input('staff_id')
            ]);
            if($newComment->save()) return $newComment;
            throw new HttpException(400, "Invalid data");
        } catch(\Expression $e) {
            return array("status" => "error");
        }
    }
}
