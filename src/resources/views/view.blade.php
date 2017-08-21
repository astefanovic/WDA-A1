@extends('layouts.default')
@section('title', 'View Tickets')
@section('content')
    <div class="container">
        @if(session()->has('msg'))
        <div class="row">
            <div class="col-12 pt-5">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    <strong>Success! </strong>{{session()->get('msg')}}
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-12 pt-5">
                <h1 class="d-inline display-4">In Progress @if ($uncompleted->count() > 0) </h1> <h5 class="d-inline"><span class="badge badge-secondary align-text-top">{{$uncompleted->count()}}</span> </h5>@endif
                <hr class="pb-5">
            </div>
            @if ($uncompleted->isEmpty())
                <div class="col-12">
                    <h1><small class="text-muted">No tickets to show</small></h1>
                </div>
            @endif

            @if($errors->any())
                <div class="col-12">
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong><br>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @foreach ($uncompleted as $ticket)
                @include('shared.ticketcard', ['ticket' => $ticket])
            @endforeach

            <div class="col-12">
                <h1 class="display-4 pt-5">Completed</h1>
                <hr class="">
            </div>
            @if ($completed->isEmpty())
                <div class="col-12">
                    <h1><small class="text-muted">No tickets to show</small></h1>
                </div>
            @endif

            @foreach ($completed as $ticket)
                @include('shared.ticketcard', ['ticket' => $ticket])
            @endforeach
        </div>
    </div>
    <!-- TODO: Add 'Mark as complete' button -->
    <!-- TODO: Make the tickets tile nicely, maybe use masonry https://stackoverflow.com/questions/32135519/how-can-i-create-tile-layout-in-bootstrap or make your own flexbox -->
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