<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function ticket() {
        return view('ticket');
    }

    public function view() {
        return view('view');
    }
}
