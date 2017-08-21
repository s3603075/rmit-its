@extends('layouts.default')
@section('content')
    <div class="container">
        <h1 class="bottom-spacing">Frequently Asked Questions</h1>
        <h4>What is the RMIT ITS?</h4>
        <p> The ITS (Information Technology Support) is a service dedicated to students experiencing problems with their
            RMIT connected devices.</p>
        <h4>What services does it provide?</h4>
        <p>The RMIT ITS provides a help center for problems that need special assistance for. Some questions could be
            already answered on the <a href="http://www.rmit.edu.au/">RMIT website</a></p>
        <h4>How do I submit a ticket?</h4>
        <p>Click <a href="/submit-ticket">here</a> or on 'Submit Ticket' on the navigation bar to submit a ticket and fill in the required fields.</p>
        <h4>What do I do when I submit a ticket/Where can I find my tickets' status?</h4>
        <p>You can search your tickets <a href="/search-ticket">here</a> or on the 'Search Tickets' item on the navigation bar to track your
            requests. </p>
        <h4>How long will my request take?</h4>
        <p>It will depend on how busy the system is, but we aim to assist you as soon as possible.</p>
        <h4>My request has been submitted but has not been responded to within a week.</h4>
        <p>Please resubmit your ticket if this occurs after one week has elapsed from the time you submitted your
            last ticket.</p>
    </div>
@stop