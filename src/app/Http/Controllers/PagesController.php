<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class PagesController extends Controller
{
    public function ticket() {
        $ticket = new Ticket;
        return view('ticket', ['ticket' => $ticket]);
    }

    public function view() {
        return view('view');
    }
}
