<div class="tab-pane active" id="general">
    <div class="review-wrapper">
        <!-- /.review-control -->
        <!-- /.review-paper-heading -->
        @foreach($reviews as $review)
            <div class="review-list-item" data-fill-color="true" data-feed-id="{{$review->id}}"
                 data-feed-status="{{$review->comments->first()->isUnread($currentUserId) ? "false" : "true"}}">
                @include('admin.reviews.review-message')
            </div><!-- /.panel.review-list-item -->
    @endforeach
    <!-- /.review-paper-body -->
        <!-- /.review-paper -->
    </div>
    <!-- /.review-wrapper -->
</div>