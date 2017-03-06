<div class="box-header with-border">
    <h3 class="box-title">
        <strong>
            <span class="text-muted">user - </span>
            <a href="{{ route("admin::users::show", $review->user->id) }}">
                {{$review->user->name}}
            </a>
        </strong>
        <span class="text-info">|</span>
        <strong>
            <span class="text-muted">product - </span>
            <a href="{{ route("admin::products::show", $review->product->id) }}">
                {{str_limit($review->product->title, 25)}}
            </a>
        </strong>
        <span class="text-info">|</span>
        @if($review->comments->first()->isUnread($currentUserId))
            <button class="btn btn-xs review-item-status read label label-warning">click to read</button>
        @else
            <span class="review-item-status label label-default">read</span>
        @endif
        @if($review->hidden)
            <span class="review-item-status label label-info"> hidden </span>
        @else
            <span class="review-item-status label label-info"> visible</span>
        @endif
    </h3>
    <div class="box-tools pull-right">

        @if($review->hidden)
            <a class="btn btn-default btn-xs text-info"
               href="{{ route('admin::reviews::visibility', $review->id) }}"
               title="Toggle Visibility">
                make <b>hidden</b>
            </a>
        @else
            <a class="btn btn-default btn-xs text-warning"
               href="{{ route('admin::reviews::visibility', $review->id) }}"
               title="Toggle Visibility">
                make <b>visible</b>
            </a>
        @endif

        <a class="btn btn-danger btn-xs text-danger"
           href="{{ route('admin::reviews::get.delete', $review->id) }}"
           title="Are you sure you want to delete?">
            delete
        </a>
    </div>
    <!-- /.box-tools -->
</div>
<!-- /.box-header -->
<div class="" style="display: block;">
    <div class="media">
        <div class="media-left">
            {{--<a href="{{ route('admin::users::show', $message->user->id) }}"--}}
            {{--class="kit-avatar kit-avatar-42 no-border">--}}
            {{--<img class="media-object" src="#" alt="{{ $message->user->name }}">--}}
            {{--</a>--}}

        </div>
        <div class="media-body">

            <h2 class="text-info"> Product Review and Replies</h2>
            <strong>
                <span class="text-muted">author - </span>
                <a href="{{ route("admin::users::show", $review->user->id) }}">
                    {{$review->user->name}}
                </a>
            </strong>
            <span class="text-info">|</span>
            <strong>
                <span class="text-muted">product - </span>
                <a href="{{ route("admin::products::show", $review->product->id) }}">
                    {{str_limit($review->product->title, 25)}}
                </a>
            </strong>
            <h4>{{ $review->review }}</h4>
            <div class="text-muted">
                <small>Posted {{ $review->created_at->diffForHumans() }}</small>
            </div>
            <h3 class="text-muted"><b>Product review point</b></h3>
            <div class="col-md-6">
                @include('admin.partial._rating', [$selected = $review->rating, $readOnly = "true"])
            </div>
        </div>
    </div>
    <hr>
    <div class="box-footer box-comments" style="display: block;">
        <b class="text-muted">comments:</b>
        @include('admin.reviews.messages', [$messages = $review->comments->first()->messages])
    </div>
    <div class="clearfix"></div>
    @include('admin.reviews.review-form')
</div>
<!-- /.box-body -->
@push("scripts-add_on")
@endpush