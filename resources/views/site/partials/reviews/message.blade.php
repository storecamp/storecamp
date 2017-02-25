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
            <div class="col-md-12">
                <strong>
                    <span class="text-muted">author - </span>
                    <a href="{{ route("admin::users::show", $productReview->user->id) }}">
                        {{$productReview->user->name}}
                    </a>
                </strong>
                <h4>{{ $productReview->review }}</h4>
                <div class="text-muted">
                    <small>Posted {{ $productReview->created_at->diffForHumans() }}</small>
                </div>
            </div>
            <div class="col-md-6">
                <span class="text-muted"><b>Product review point</b></span>
                @include('admin.partial._rating', [$selected = $productReview->rating, $readOnly = "true"])
            </div>
        </div>
    </div>
    <hr>
    <div class="box-footer box-comments" style="display: block;">
        <b class="text-muted">comments:</b>
        @include('site.partials.reviews.messages', [$messages = $productReview->comments->first()])
    </div>
    <div class="clearfix"></div>
    @include('site.partials.reviews.form')
</div>
<!-- /.box-body -->
@push("scripts-add_on")
@endpush