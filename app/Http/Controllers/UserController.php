<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use Response;

class UserController extends Controller
{
    //
    public function searchTicket(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        //Get tickets specific to user
        $tickets = Ticket::where('email','=', $request['email'])
            ->get();

        return Response::json($tickets);
    }

    public function viewTicket($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('pages/userticket')->with('ticket', $ticket);
    }

    public function userDisplay()
    {
        return view('pages/findticket');
    }

}
