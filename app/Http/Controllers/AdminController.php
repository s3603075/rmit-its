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

    public function changeStatus($id, Request $request)
    {
        $ticket = Ticket::findorfail($id);

        $status = null;

        switch($request['status'])  {
            case 1:
                $status = 'Resolved';
                break;
            case 2:
                $status = 'Unresolved';
                break;
            case 3:
                $status = 'In Progress';
        }

        if($status === null)    {
            return response()->json($status, 400);
        }

        $ticket->status = $status;

        $ticket->save();

        return response()->json($ticket, 200);

    }

    public function getComments($id)
    {
        $ticket = Ticket::findorfail($id);

        $comments = $ticket->comment;

        return response()->json($comments, 200);

    }

    public function delete($id)
    {
        $ticket = Ticket::findorfail($id);

        $ticket->delete();

        return "true";
    }
}
