@extends('layouts.default')
@section('content')
    <div class="container top-spacing">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Ticket #{{$ticket->id}}</div>
                <div class="panel-body">
                    <div><b>Email:</b> {{$ticket->email}}</div>
                    <div><b>First name:</b> {{$ticket->firstname}}</div>
                    <div><b>Last name:</b> {{$ticket->lastname}}</div>
                    <div><b>OS: </b>{{$ticket->os}}</div>
                </div>
                <div class="panel-footer">
                    <div class="container-fluid">
                        <div class="col-sm-3 col-sm-offset-9">
                            <div class="text-center">
                                <h4> {{$ticket->status}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section>
            <div class="col-md-8 col-md-offset-2">
                <h4>Issue</h4>
                <p class="bottom-spacing">{{$ticket->issue}}</p>
                <h4>Comments</h4>
                @foreach ($ticket->comment as $comment)
                    <div>{{$comment->body}}</div>
                    <div class="bottom-spacing comment-footer">ITS support at {{$comment->created_at}}</div>
                @endforeach
            </div>
        </section>
    </div>
@stop
