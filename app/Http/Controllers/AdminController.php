<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return Ticket::all();
    }

    public function show($id)
    {
        return Ticket::find($id);
    }

    public function delete($id)
    {
        $ticket = Ticket::findorfail($id);

        $ticket->delete();

        return "true";
    }
}
