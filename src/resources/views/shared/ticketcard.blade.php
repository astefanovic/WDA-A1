<div class="col-md-6 col-12">
    <div class="card bg-light mb-3">
        <div class="card-header @if($ticket->completed === 0) bg-warning @else bg-success @endif">
            {!! Form::open(['action' => 'CommentController@update']) !!}
            {!! Form::hidden('ticketId', $ticket->id) !!}
                @if($ticket->completed === 0)
                    <button type="submit" class="glyphicon-unchecked float-right"></button>
                @endif
            {!! Form::close() !!}
            <h3 clas    s="card-title">{{$ticket->subject}}</h3> - <em>{{$ticket->type}}</em>
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