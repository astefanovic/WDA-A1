<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function store(Request $request) {
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
}
