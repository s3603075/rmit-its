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
            case 'Resolved':
                $status = $request['status'];
                break;
            case 'Unresolved':
                $status = $request['status'];
                break;
        }

        if($status === null)    {
            return response()->json($status, 400);
        }

        $ticket->status = $status;

        return response()->json($status, 200);

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
