@extends('layouts.default')
@section('content')
    <div class="container top-spacing">
        <h1>Search for your tickets</h1>
        <button type="button" class="btn btn-primary btn-lg bottom-spacing" data-toggle="modal" data-target="#myModal">Search Tickets</button>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>OS</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody id="ticketlist">
                </tbody>
            </table>
        </div>
        <h2 id="not-found">
            No results found.
        </h2>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Enter your email to check the status of your tickets</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('email', 'Email Address') !!}
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn-find" name="btn-find" class="btn btn-success" data-dismiss="modal">Submit</button>
                    <button type="button" id="modal-close" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {!! Html::script('js/tickets.js') !!}
@stop