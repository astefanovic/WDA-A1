@extends('layouts.default')
@section('title', 'View Tickets')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 page-header">
                <h1>In Progress @if ($uncompleted->count() > 0) <span class="badge">{{$uncompleted->count()}}</span> @endif</h1>
            </div>
            @if ($uncompleted->isEmpty())
                <div class="col-xs-12">
                    <h3>No tickets to show</h3>
                </div>
            @endif
            @foreach ($uncompleted as $ticket)
                {!! Form::open(['action' => 'CommentController@store']) !!}
                <div class="col-md-6 col-xs-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$ticket->subject}}</h3> - <em>{{$ticket->type}}</em>
                        </div>
                        <div class="panel-body">{{$ticket->desc}} <br> <div class="text-right"> - <em>{{$ticket->user->email}}</em></div></div>
                        <ul class="list-group">
                            @foreach ($ticket->comments as $comment)
                                <li class="list-group-item panel-footer">{{$comment->text}}<br> <div class="text-right"> - <em>{{$comment->user->email}}</em></div></li>
                            @endforeach
                            <li class="list-group-item">
                                {!! Form::hidden('ticketId', $ticket->id) !!}
                                <div class="form-group">
                                    {!! Form::select('email', $emails, null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::textarea('text', '', ['placeholder' => 'New Comment', 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit(null, ['class' => 'btn btn-default']) !!}
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                {!! Form::close() !!}
            @endforeach

            <hr>
            <div class="col-xs-12 page-header">
                <h1>Completed</h1>
            </div>
            @if ($completed->isEmpty())
                <div class="col-xs-12">
                    <h3>No tickets to show</h3>
                </div>
            @endif
            @foreach ($completed as $ticket)
                {!! Form::open(['action' => 'CommentController@store']) !!}
                <div class="col-md-6 col-xs-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$ticket->subject}}</h3> - <em>{{$ticket->type}}</em>
                        </div>
                        <div class="panel-body">{{$ticket->desc}} <br> <div class="text-right"> - <em>{{$ticket->user->email}}</em></div></div>
                        <ul class="list-group">
                            @foreach ($ticket->comments as $comment)
                                <li class="list-group-item panel-footer">{{$comment->text}}<br> <div class="text-right"> - <em>{{$comment->user->email}}</em></div></li>
                            @endforeach
                            <li class="list-group-item">
                                {!! Form::hidden('ticketId', $ticket->id) !!}
                                <div class="form-group">
                                    {!! Form::select('email', $emails, null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::textarea('text', '', ['placeholder' => 'New Comment', 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit(null, ['class' => 'btn btn-default']) !!}
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                {!! Form::close() !!}
            @endforeach
        </div>
    </div>
    <!-- TODO: Add 'Mark as complete' button -->
    <!-- TODO: Make the tickets tile nicely, maybe use masonry https://stackoverflow.com/questions/32135519/how-can-i-create-tile-layout-in-bootstrap or make your own flexbox -->
    <!-- TODO: Make text area resize on vertical only -->
    {{-- When login is implemented, replacement for commenting:
    <div class="panel-footer">
                            <div class="input-group">
                                {!! Form::text('comment', '', ['placeholder' => 'New Comment', 'class' => 'form-control']) !!}
            <div class="input-group-btn">
{!! Form::submit(null, ['class' => 'btn btn-default']) !!}
            </div>
        </div>
    </div> --}}
@endsection