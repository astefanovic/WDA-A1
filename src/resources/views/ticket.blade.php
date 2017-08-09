@extends('layouts.default')
@section('title', 'RMIT Ticketing')
@section('content')
<div class="container">
    <div class="page-header">
        <h1>Create ticket</h1>
    </div>

    <!-- TODO: On button click enable :invalid css selector, alongside php validation -->
    <div>
        {!! Form::open(['action' => 'TicketController@store']) !!}
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="form-group">
                    {!! Form::email('email', '', ['placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
            <div class="col-md-4 col-xs-6">
                <div class="form-group">
                    {!! Form::text('firstname', '', ['placeholder' => 'Firstname', 'class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
            <div class="col-md-4 col-xs-6">
                <div class="form-group">
                    {!! Form::text('lastname', '', ['placeholder' => 'Lastname', 'class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    {!! Form::text('subject', '', ['placeholder' => 'Subject', 'class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    {!! Form::select('type', ['its' => 'IT Services', 'web' => 'Web Services', 'business' => 'Business Systems', 'arg' => 'ARG'], null, ['placeholder' => 'Issue Type', 'class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    {!! Form::textarea('description', '', ['placeholder' => 'Description', 'class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::submit(null, ['class' => 'btn btn-primary']) !!}
        </div>

        {!!  Form::close() !!}
    </div>
</div>
@endsection
