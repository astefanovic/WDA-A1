<div class="col-md-6 col-12">
    <div class="card bg-light mb-3">
        <div class="card-header bg-warning">
            <h3 class="card-title">{{$ticket->subject}}</h3> - <em>{{$ticket->type}}</em>
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
            {!! Form::open(['action' => 'CommentController@store']) !!}
            <li class="collapse card-body" id="{{$ticket->id}}" data-parent="#accordion">
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