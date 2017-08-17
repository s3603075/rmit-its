<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Ticket;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages/home');
    }

    public function form()
    {
        return view('pages/submit');
    }

    public function about()
    {
        return view('pages/about');
    }

    public function faq()
    {
        return view('pages/faq');
    }

}
