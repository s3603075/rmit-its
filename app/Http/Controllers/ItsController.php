<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Ticket;
use Illuminate\Http\Request;

class ItsController extends Controller
{
    //
    public function submitComment($id, Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        //Need proper execption handling (404 page?)
        $ticket = Ticket::findOrFail($id);

        $comment = new Comment();
        $comment->body = $request['body'];
        $ticket->comment()->save($comment);

        return redirect()->back()->with('message', 'Comment Added');
    }

    public function changeStatus(Request $request)
    {
        //Edit error messages
        $this->validate($request, [
            'status' => 'required|between:1,4',
            'id' => 'required'
        ]);

        //Exception handling?
        $ticket = Ticket::findOrFail($request['id']);

        $statusNo = $request['status'];
        $status = 'Pending';

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
