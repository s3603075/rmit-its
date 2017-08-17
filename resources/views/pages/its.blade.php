@extends('layouts.default')
@section('content')
    <div class="container top-spacing">
        @foreach ($tickets as $ticket)
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Ticket #{{$ticket->id}}</div>
                    <div class="panel-body">
                        <div>{{$ticket->firstname}} {{$ticket->lastname}}</div>
                        <div>{{$ticket->os}}</div>
                        <div>{{$ticket->issue}}</div>
                    </div>
                    <div class="panel-footer">
                        <div class="container-fluid">
                            <div class="col-sm-3">
                                <div class="text-center">
                                    <a href="/ticket/{{$ticket->id}}" class="btn btn-default btn-lg">Edit Details</a>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-offset-6">
                                <div class="text-center">
                                    <h4> {{$ticket->status}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
