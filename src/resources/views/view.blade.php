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
                <div class="col-md-6 col-xs-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$ticket->subject}}</h3> - <em>{{$ticket->type}}</em>
                        </div>
                        <div class="panel-body">{{$ticket->desc}}</div>
                        <ul class="list-group">
                            <li class="list-group-item">Comment 1 <br> <em>- Username</em></li>
                            <li class="list-group-item">Comment 2 <br> <em>- Username</em></li>

                        </ul>
                        <div class="panel-footer">
                            <div class="input-group">
                                {!! Form::text('comment', '', ['placeholder' => 'New Comment', 'class' => 'form-control']) !!}
                                <div class="input-group-btn">
                                    {!! Form::submit(null, ['class' => 'btn btn-default']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                <div class="col-md-6 col-xs-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$ticket->subject}}</h3> - <em>{{$ticket->type}}</em>
                        </div>
                        <div class="panel-body">{{$ticket->desc}}</div>
                        <ul class="list-group">
                            <li class="list-group-item">Comment 1 <br> <em>- Username</em></li>
                            <li class="list-group-item">Comment 2 <br> <em>- Username</em></li>
                        </ul>
                        <div class="panel-footer">
                            <div class="input-group">
                                {!! Form::text('comment', '', ['placeholder' => 'New Comment', 'class' => 'form-control']) !!}
                                <div class="input-group-btn">
                                    {!! Form::submit(null, ['class' => 'btn btn-default']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- TODO: Make the tickets tile nicely, maybe use masonry https://stackoverflow.com/questions/32135519/how-can-i-create-tile-layout-in-bootstrap or make your own flexbox -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 page-header">
                <h1>In Progress</h1>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ticket Title</h3> - <em>Type</em>
                    </div>
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum </div>
                    <ul class="list-group">
                        <li class="list-group-item">Comment 1 <br> <em>- Username</em></li>
                        <li class="list-group-item">Comment 2 <br> <em>- Username</em></li>
                    </ul>
                </div>
            </div>
                <div class="col-md-6 col-xs-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Ticket Title</h3> - <em>Type</em>
                        </div>
                        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</div>
                        <ul class="list-group">
                            <li class="list-group-item">Comment 1 <br> <em>- Username</em></li>
                            <li class="list-group-item">Comment 2 <br> <em>- Username</em></li>
                            <li class="list-group-item">Comment 3 <br> <em>- Username</em></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Ticket Title</h3> - <em>Type</em>
                        </div>
                        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                        <ul class="list-group">
                            <li class="list-group-item">Comment 1 <br> <em>- Username</em></li>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="col-xs-12 page-header">
                    <h1>Completed</h1>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Ticket Title</h3> - <em>Type</em>
                        </div>
                        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                        <ul class="list-group">
                            <li class="list-group-item">Comment 1 <br> <em>- Username</em></li>
                            <li class="list-group-item">Comment 2 <br> <em>- Username</em></li>
                            <li class="list-group-item">Comment 3 <br> <em>- Username</em></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Ticket Title</h3> - <em>Type</em>
                        </div>
                        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                        <ul class="list-group">
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Ticket Title</h3> - <em>Type</em>
                        </div>
                        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                        <ul class="list-group">
                            <li class="list-group-item">Comment 1 <br> <em>- Username</em></li>
                            <li class="list-group-item">Comment 2 <br> <em>- Username</em></li>
                            <li class="list-group-item">Comment 3 <br> <em>- Username</em></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Ticket Title</h3> - <em>Type</em>
                        </div>
                        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                        <ul class="list-group">
                            <li class="list-group-item">Comment 1 <br> <em>- Username</em></li>
                            <li class="list-group-item">Comment 2 <br> <em>- Username</em></li>
                            <li class="list-group-item">Comment 3 <br> <em>- Username</em></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

@endsection