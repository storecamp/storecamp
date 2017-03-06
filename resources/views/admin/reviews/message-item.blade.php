<div class="box-comment" data-message-block="{{$message->id}}">
    <div class="media-left">
        {{--<a href="{{ route('admin::users::show', $message->user->id) }}"--}}
        {{--class="kit-avatar kit-avatar-42 no-border">--}}
        {{--<img class="media-object" src="#" alt="{{ $message->user->name }}">--}}
        {{--</a>--}}
    </div>
    <div class="comment-text">
                         <span class="username">
                             <a href="{{ route("admin::users::show", $message->user->id) }}">
                            {{$message->user->name}}
                             </a>
                        <a style="margin: auto 10px;" data-href="{{route('admin::reviews::deleteMessage', [$message->id])}}" data-message-block="{{$message->id}}" class="btn btn-danger btn-xs deleteMessage pull-right">Delete</a>
                        <a style="margin: auto 10px;" data-href="{{route('admin::reviews::editMessage', [$message->id])}}" data-message-block="{{$message->id}}" class="btn btn-link btn-xs editMessage pull-right">Edit</a>
                        <span class="text-muted pull-right">Posted {{ $message->created_at->diffForHumans() }}</span>
                      </span>
        <hr>
        <p class="comment-text" id="{{$message->id}}">{{ $message->body }}</p>
        <div class="text-muted">
            <small>Posted {{ $message->created_at->diffForHumans() }}</small>
            <small> | Regards, <b>{{ $message->user->name }}</b></small>
        </div>
    </div>
</div>