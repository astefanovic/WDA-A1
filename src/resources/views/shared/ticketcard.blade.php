<div class="col-md-6 col-12">
    <div class="card bg-light mb-3">
            <div class="card-header @if($ticket->completed === 0) bg-warning
                                @else bg-green @endif">
                <button class="btn btn-outline-dark dropdown-toggle float-right no-caret icon-wrapper" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                    <i class="material-icons">settings</i>
                </button>
                <div class="dropdown-menu">
                    {!! Form::open(['action' => 'CommentController@delete']) !!}
                    {!! Form::hidden('ticketId', $ticket->id) !!}
                    {!! Form::button('<i class="material-icons">delete</i>', ['type'=>'submit', 'class' => 'btn btn-danger text-danger dropdown-item']) !!}
                    {!! Form::close() !!}

                    {!! Form::open(['action' => 'CommentController@update']) !!}
                    {!! Form::hidden('ticketId', $ticket->id) !!}
                    @if($ticket->completed === 0){!! Form::button('<i class="material-icons">done</i>', ['type'=>'submit', 'class' => 'btn btn-success text-success dropdown-item']) !!}@endif
                    {!! Form::close() !!}
                </div>
                {{--{!! Form::open(['action' => 'CommentController@delete', 'class' => 'float-right']) !!}
                {!! Form::hidden('ticketId', $ticket->id) !!}
                {!! Form::button('<i class="material-icons">delete</i>', ['type'=>'submit', 'class' => 'btn btn-danger float-right']) !!}
                {!! Form::close() !!}

                {!! Form::open(['action' => 'CommentController@update', 'class' => 'float-right']) !!}
                {!! Form::hidden('ticketId', $ticket->id) !!}
                @if($ticket->completed === 0){!! Form::button('<i class="material-icons">done</i>', ['type'=>'submit', 'class' => 'btn btn-success float-right']) !!}@endif
                {!! Form::close() !!} --}}
                <h3 class="card-title">{{$ticket->subject}}</h3> - <em>{{$ticket->type}}</em>
        </div>


        <div class="card-body">{{$ticket->desc}} <br> <div class="text-right"> - <em>{{$ticket->user->email}}</em></div></div>
        <ul class="list-group list-group-flush">
            @foreach ($ticket->comments as $comment)
                <li class="list-group-item panel-footer">{{$comment->text}}<br>
                    <div class="text-right"> - <em>{{$comment->user->email}}</em></div></li>
            @endforeach
            @if($ticket->completed === 0)
                <a class="list-group-item panel-footer text-center text-light bg-dark-warning" data-toggle="collapse" href="#{{$ticket->id}}" aria-expanded="false" aria-controls="{{$ticket->id}}">
                    Add Comment
                </a>
                {!! Form::open(['action' => 'CommentController@store']) !!}
                <li class="collapse card-body" id="{{$ticket->id}}" data-parent="#accordion" value="store">
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
             @endif
        </ul>
    </div>
</div>
{!! Form::close() !!}