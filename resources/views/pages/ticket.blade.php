@extends('layouts.default')
@section('content')
    <div class="container top-spacing">
        @if(session()->has('message'))
            <div class="alert alert-success">{{session()->get('message')}}</div>
        @endif
        @if(session()->has('invalidstatus'))
            <div class="alert alert-warning">{{session()->get('invalidstatus')}}</div>
        @endif
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Ticket #{{$ticket->id}}</div>
                <div class="panel-body">
                    <div><b>Email:</b> {{$ticket->email}}</div>
                    <div><b>First name:</b>{{$ticket->firstname}}</div>
                    <div><b>Last name: </b>{{$ticket->lastname}}</div>
                    <div><b>OS: </b>{{$ticket->os}}</div>
                </div>
                <div class="panel-footer">
                    <div class="container-fluid">
                        <div class="col-sm-3">
                            {!! Form::open(array('route' => array('change.status.ticket', $ticket->id))) !!}
                            <div class="form-group">
                                {!! Form::select('status', ['0' => 'Change Status','1' => 'Pending', '2' => 'In Progress',
                                '3' => 'Unresolved', '4' => 'Resolved'], null, ['class' => 'form-control change-status']) !!}
                            </div>
                            {!! Form::close() !!}
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
        <section>
            <div class="col-md-8 col-md-offset-2 bottom-spacing">
                <h4>Issue</h4>
                <p class="bottom-spacing">{{$ticket->issue}}</p>
                <h4>Comments</h4>
                @foreach ($ticket->comment as $comment)
                    <div>{{$comment->body}}</div>
                    <div class="bottom-spacing comment-footer">ITS support at {{$comment->created_at}}</div>
                @endforeach
                <h4>Add a Comment</h4>
                {!! Form::open(array('route' => array('submit.comment.ticket', $ticket->id))) !!}
                <div class="form-group">
                    {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 4]) !!}
                </div>
                {!!  Form::submit('Submit', ['class' => 'btn btn-primary'])!!}
                {!! Form::close() !!}
            </div>
        </section>
    </div>
    {!! Html::script('js/ticket-view.js') !!}
@stop
