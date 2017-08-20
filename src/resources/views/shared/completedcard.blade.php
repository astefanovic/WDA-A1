<div class="col-md-6 col-12">
    <div class="card bg-light mb-3">
        <div class="card-header @if($ticket->completed === 0) bg-warning @else bg-success @endif">
            <h3 class="card-title">{{$ticket->subject}}</h3> - <em>{{$ticket->type}}</em>
        </div>
        <div class="card-body">{{$ticket->desc}} <br> <div class="text-right"> - <em>{{$ticket->user->email}}</em></div></div>
        <ul class="list-group list-group-flush">
            @foreach ($ticket->comments as $comment)
                <li class="list-group-item panel-footer">{{$comment->text}}<br>
                    <div class="text-right"> - <em>{{$comment->user->email}}</em></div></li>
            @endforeach
        </ul>
    </div>
</div>
