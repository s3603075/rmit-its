@extends('layouts.default')
@section('content')
    <div class="container top-spacing">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Ticket #{{$ticket->id}}</div>
                <div class="panel-body">
                    <div>{{$ticket->firstname}}</div>
                    <div>{{$ticket->os}}</div>
                    <div>{{$ticket->issue}}</div>
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
                <h4>Comments</h4>
                @foreach ($ticket->comment as $comment)
                    <div>{{$comment->body}}</div>
                @endforeach
            </div>
        </section>
    </div>
@stop
