@extends('layouts.default')
@section('title', 'View Tickets')
@section('content')
    {{-- Removes the tickets not belonging to current user --}}
    @php
        foreach($uncompleted as $arrayNumber => $ticket) {
            if($ticket->user_id != Auth::user()->id) unset($uncompleted[$arrayNumber]);
        }

        foreach($completed as $arrayNumber => $ticket) {
            if($ticket->user_id != Auth::user()->id) unset($completed[$arrayNumber]);
        }
    @endphp

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
@endsection