<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Ticket;
use Illuminate\Http\Request;

class ItsController extends Controller
{
    //Handles comment submission
    public function submitComment($id, Request $request)
    {
        //Sanitize input
        $this->validate($request, [
            'body' => 'required'
        ]);

        //Find the ticket
        $ticket = Ticket::findOrFail($id);
        //Create new ticket instance and populate with values in DB
        $comment = new Comment();
        $comment->body = $request['body'];
        $ticket->comment()->save($comment);

        //Redirect with success message.
        return redirect()->back()->with('message', 'Comment Added');
    }

    //Handles changing ticket status
    public function changeStatus($id, Request $request)
    {
        $this->validate($request, [
            'status' => 'required|between:1,4'
        ]);

        $ticket = Ticket::findOrFail($id);

        //Set status and default if fail
        $statusNo = $request['status'];
        $status = 'Pending';

        //Switch to corresponding value
        switch($statusNo) {
            case 1:
                $status = 'Pending';
                break;
            case 2:
                $status = 'In Progress';
                break;
            case 3:
                $status = 'Unresolved';
                break;
            case 4:
                $status = 'Resolved';
                break;
        }

        //Save instance
        $ticket->status = $status;
        $ticket->save();

        return redirect()->back();
    }

    public function displayTickets()
    {
        $tickets = Ticket::all();
        return view('pages/its')->with('tickets', $tickets);
    }

    public function ticket($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('pages/ticket')->with('ticket', $ticket);
    }

}
