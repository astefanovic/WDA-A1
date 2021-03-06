@extends('layouts.default')
@section('title', 'RMIT Ticketing')
@section('content')
<div class="container">
    <h1 class="display-4 py-5">Create Ticket</h1>
    <div class="print">
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        {!! Form::open(['action' => 'TicketController@store']) !!}
        {!! Form::hidden('userId', Auth::user()->id) !!}
        {{--
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="form-group">
                    {!! Form::email('email', '', ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-4 col-xs-6">
                <div class="form-group">
                    {!! Form::text('firstname', '', ['placeholder' => 'Firstname', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-4 col-xs-6">
                <div class="form-group">
                    {!! Form::text('lastname', '', ['placeholder' => 'Lastname', 'class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <hr> --}}
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    {!! Form::text('subject', '', ['placeholder' => 'Subject', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    {!! Form::select('type', ['IT Services' => 'IT Services', 'Web Services' => 'Web Services', 'Business Systems' => 'Business Systems', 'ARG' => 'ARG'], null, ['placeholder' => 'Issue Type', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-12 col-xs-12">
                <div class="form-group">
                    {!! Form::textarea('description', '', ['placeholder' => 'Description', 'class' => 'form-control']) !!}
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
