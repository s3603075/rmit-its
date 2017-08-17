@extends('layouts.default')
@section('style')
    {!! Html::style('css/main-page.css') !!}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="jumbotron text-center">
                <h1>Having IT issues?</h1>
                <h3>Submit a request and we'll be in contact shortly.</h3>
                <p class="button-spacing"><a class="btn btn-success btn-lg " href="/submit-ticket" role="button">Submit Ticket</a></p>
            </div>
        </div>
        <div class="row spacing">
            <div class="col-md-3 row-offset ">
                <h2>View your tickets</h2>
                <p>Viewing your current tickets' progress is simple. Enter your email into the search field and press
                    submit, and all your details and ticket comments will be displayed.</p>
                <p><a class="btn btn-default" href="/findticket" role="button">View my tickets »</a></p>
            </div>
            <div class="col-md-3 ">
                <h2>Submit your request</h2>
                <p>If you have difficulties with any of the IT systems that cannot be resolved in the FAQ, fill in your
                    details and submit your issue.</p>
                <p><a class="btn btn-default" href="/submit-ticket" role="button">Submit request »</a></p>
            </div>
            <div class="col-md-3 ">
                <h2>FAQ</h2>
                <p>See if your inquiry has already been answered here</p>
                <p><a class="btn btn-default" href="/faq" role="button">View FAQ »</a></p>
            </div>
        </div>

    </div>

@stop
