@extends('layouts.default')
@section('content')
    <div class="container top-spacing">
        @if(session()->has('successMessage'))
            <div class="alert alert-success">{{session()->get('successMessage')}}</div>
        @elseif(session()->has('failMessage'))
            <div class="alert alert-danger">{{session()->get('failMessage')}}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-md-6 col-md-offset-3 bottom-spacing">
            <h1>Submit a Request</h1>
            {!! Form::open(['action' => 'SubmitController@store']) !!}
            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::label('email', 'E-Mail Address') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                {{ $errors->first('email', ':message') }}
            </div>
            <div class="form-group {{ $errors->has('firstname') ? ' has-error' : '' }}">
                {!! Form::label('firstname', 'First Name') !!}
                {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
                {{ $errors->first('firstname', ':message') }}
            </div>
            <div class="form-group {{ $errors->has('lastname') ? ' has-error' : '' }}">
                {!! Form::label('lastname', 'Last Name') !!}
                {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
                {{ $errors->first('lastname', ':message') }}
            </div>
            <div class="form-group">
                {!! Form::label('os','Operating System') !!}
                {!! Form::select('os', ['1' => 'Windows', '2' => 'Mac OS', '3' => 'Linux', '4' => 'iOS', '5' => 'Android'], null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group {{ $errors->has('issue') ? ' has-error' : '' }}">
                {!! Form::label('issue', 'Issue') !!}
                {!! Form::textarea('issue', null, ['class' => 'form-control']) !!}
                {{ $errors->first('issue', ':message') }}
            </div>
            {!!  Form::submit('Submit', ['class' => 'btn btn-primary'])!!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
