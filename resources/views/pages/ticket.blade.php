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
                            <form action="change-status/" method="POST">
                                <div class="form-group">
                                    <select class="form-control" name="status" id="status" onchange='if(this.value != 0) { this.form.submit(); }'>
                                        <option selected disabled>Change Status</option>
                                        <option value="1">Pending</option>
                                        <option value="2">In Progress</option>
                                        <option value="3">Unresolved</option>
                                        <option value="4">Resolved</option>
                                    </select>
                                </div>
                                <input type="hidden" name="id" value="{{$ticket->id}}">
                                {{ csrf_field() }}
                            </form>
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
                <form action="/submit-comment/{{$ticket->id}}" method="POST">
                    <div class="form-group">
                        <textarea class="form-control" rows="4" name="body" id="body"></textarea>
                    </div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </section>
    </div>
@stop
