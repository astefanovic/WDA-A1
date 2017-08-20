<div class="col-md-6 col-12">
    <div class="card bg-light mb-3">
        <div class="card-header @if($ticket->completed === 0) bg-warning @else bg-success @endif">


            <h3 class="card-title">{{$ticket->subject}}</h3>

            {{--
            <input type="hidden" name="status" value="0">
            {!!Form::checkbox('status', 1, false)!!}


            <form action = "{{url('/ticketStatus')}}" method="post">
                <input name="status" value="1">
                <button type="submit" name="ticStatus">Completed</button>
            </form> --}}

            - <em>{{$ticket->type}}</em>
            {!! Form::open(['action' => 'CommentController@update']) !!}
            {!! Form::hidden('ticketId', $ticket->id) !!}
            @if($ticket->completed === 0){!! Form::submit('Done', ['class' => 'btn btn-success float-right']) !!}@endif
            {!! Form::close() !!}

        </div>
        <div class="card-body">{{$ticket->desc}} <br> <div class="text-right"> - <em>{{$ticket->user->email}}</em></div></div>
        <ul class="list-group list-group-flush">
            @foreach ($ticket->comments as $comment)
                <li class="list-group-item panel-footer">{{$comment->text}}<br>
                    <div class="text-right"> - <em>{{$comment->user->email}}</em></div></li>
            @endforeach
            <a class="list-group-item panel-footer text-center text-light bg-dark" data-toggle="collapse" href="#{{$ticket->id}}" aria-expanded="false" aria-controls="{{$ticket->id}}">
                Add Comment
            </a>
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
        </ul>
    </div>
</div>
{!! Form::close() !!}