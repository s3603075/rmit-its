<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class SubmitController extends Controller
{
    //Store ticket details to database
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'firstname' => 'required|max:255|alpha_num',
            'lastname' => 'required|max:255|alpha_num',
            'os' => 'required|between:1,5',
            'issue' => 'required',
        ]);

        $ticket = Ticket::create($request->all());

        $os = 'No OS';

        switch($request['os']) {
            case 1:
                $os = 'Windows';
                break;
            case 2:
                $os = 'Mac OS';
                break;
            case 3:
                $os = 'Linux';
                break;
            case 4:
                $os = 'iOS';
                break;
            case 5:
                $os = 'Android';
                break;
        }

        $ticket->os = $os;

        $status = 'Pending';
        $ticket->status = $status;

        if($ticket->save()) {
            return redirect()->back()->with('successMessage','Sent successfully.');
        }
        else    {
            return redirect()->back()->with('failMessage','An error has occurred. Please try again.');
        }

    }
}
