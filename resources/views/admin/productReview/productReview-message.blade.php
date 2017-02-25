<div class="box-header with-border">
    <h3 class="box-title">
        <strong>
            <span class="text-muted">user - </span>
            <a href="{{ route("admin::users::show", $productReview->user->id) }}">
                {{$productReview->user->name}}
            </a>
        </strong>
        <span class="text-info">|</span>
        <strong>
            <span class="text-muted">product - </span>
            <a href="{{ route("admin::products::show", $productReview->product->id) }}">
                {{str_limit($productReview->product->title, 25)}}
            </a>
        </strong>
        <span class="text-info">|</span>
        @if($productReview->comments->first()->isUnread($currentUserId))
            <button class="btn btn-xs review-item-status read label label-warning">click to read</button>
        @else
            <span class="review-item-status label label-default">read</span>
        @endif
        @if($productReview->hidden)
            <span class="review-item-status label label-info"> hidden </span>
        @else
            <span class="review-item-status label label-info"> visible</span>
        @endif
    </h3>
    <div class="box-tools pull-right">
        <a class="btn btn-warning btn-xs text-warning"
           href="{{ route('admin::reviews::visibility', $productReview->id) }}"
           title="Toggle Visibility">
            @if($productReview->hidden)
                make visible
            @else
                make hidden
            @endif
        </a>
        <a class="btn btn-danger btn-xs text-danger"
           href="{{ route('admin::reviews::get.delete', $productReview->id) }}"
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
                <a href="{{ route("admin::users::show", $productReview->user->id) }}">
                    {{$productReview->user->name}}
                </a>
            </strong>
            <span class="text-info">|</span>
            <strong>
                <span class="text-muted">product - </span>
                <a href="{{ route("admin::products::show", $productReview->product->id) }}">
                    {{str_limit($productReview->product->title, 25)}}
                </a>
            </strong>
            <h4>{{ $productReview->review }}</h4>
            <div class="text-muted">
                <small>Posted {{ $productReview->created_at->diffForHumans() }}</small>
            </div>
            <h3 class="text-muted"><b>Product review point</b></h3>
            <div class="col-md-6">
                @include('admin.partial._rating', [$selected = $productReview->rating, $readOnly = "true"])
            </div>
        </div>
    </div>
    <hr>
    <div class="box-footer box-comments" style="display: block;">
        <b class="text-muted">comments:</b>
        @include('admin.productReview.messages', [$messages = $productReview->comments->first()->messages])
    </div>
    <div class="clearfix"></div>
    @include('admin.productReview.productReview-form')
</div>
<!-- /.box-body -->
@push("scripts-add_on")
@endpush