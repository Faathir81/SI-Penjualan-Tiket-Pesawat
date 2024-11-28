<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket; // Model untuk tiket

class AdminController extends Controller
{
    public function stores()
    {
        $tickets = Ticket::where('user_id', auth()->id())->get();

        return view('store', compact('tickets'));
    }
}
