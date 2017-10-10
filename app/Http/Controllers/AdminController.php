<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Comment;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    //Get all tickets in db
    public function index()
    {
        return Ticket::all();
    }

    //Show specific ticket
    public function show($id)
    {
        return Ticket::find($id);
    }

    //Changes status within DB
    public function changeStatus($id, Request $request)
    {
        $ticket = Ticket::findorfail($id);

        $status = null;

        //Match with corresponding number
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

        //If null, return 400 fail
        if($status === null)    {
            return response()->json($status, 400);
        }

        //Else save this into the db
        $ticket->status = $status;

        $ticket->save();

        return response()->json($ticket, 200);

    }

    //Get the comments from a specified ticket

    public function getComments($id)
    {
        $ticket = Ticket::findorfail($id);

        $comments = $ticket->comment;

        //Return comments as json response
        return response()->json($comments, 200);

    }

    /**Store comment within post request body **/

    public function editComments($id, Request $request)
    {
        $ticket = Ticket::findorfail($id);
        $res = $request->all();

        //If there is no text, do not save within db and return 400 for fail
        if($res["blocks"][0]["text"] === null)    {
            return response()->json($res, 400);
        }

        //Else loop through the blocks array and store with space
        $content = null;
        foreach($res["blocks"] as $block)   {
            $content .= $block["text"] . " ";
        }

        //Create a new comment and store reference within db
        $comment = new Comment();
        $comment->body = $content;
        $ticket->comment()->save($comment);

        //Return with 200 response when successful
        return response()->json($res, 200);
    }

}
