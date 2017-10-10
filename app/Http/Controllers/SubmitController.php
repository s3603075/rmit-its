<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmitController extends Controller
{
    //Store ticket details to database
    public function store(Request $request)
    {
        //sanitize input
        $this->validate($request, [
            'firstname' => 'required|max:255|alpha_num',
            'lastname' => 'required|max:255|alpha_num',
            'os' => 'required|between:1,5',
            'issue' => 'required',
        ]);

        //Get authentication details

        $userId = Auth::id();
        $userEmail = Auth::user()->email;

        //Fill initial details

        $ticket = Ticket::create(array_merge($request->all(), ['user_id' => $userId, 'email' => $userEmail]));

        $os = 'No OS';

        //Save OS, switch to corresponding value

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

        //Set status
        $status = 'Pending';
        $ticket->status = $status;

        //Redirect with status
        if($ticket->save()) {
            return redirect()->back()->with('successMessage','Sent successfully.');
        }
        else    {
            return redirect()->back()->with('failMessage','An error has occurred. Please try again.');
        }

    }
}
