@extends('layouts.default')
@section('content')
    <div class="container top-spacing">
        <h2>ITS Staff Tickets</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>OS</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{$ticket->id}}</td>
                        <td>{{$ticket->email}}</td>
                        <td>{{$ticket->firstname}}</td>
                        <td>{{$ticket->lastname}}</td>
                        <td>{{$ticket->os}}</td>
                        <td>{{$ticket->status}}</td>
                        <td><div class="text-center"><a href="/ticket/{{$ticket->id}}" class="btn btn-default">Edit Details</a></div></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
