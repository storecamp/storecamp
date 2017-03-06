<div class="tab-pane active" id="general">
    <div class="review-wrapper">
        <!-- /.review-control -->
        <!-- /.review-paper-heading -->
        @foreach($productReviews as $productReview)
            <div class="review-list-item" data-fill-color="true" data-feed-id="{{$productReview->id}}"
                 data-feed-status="{{$productReview->comments->first()->isUnread($currentUserId) ? "false" : "true"}}">
                @include('admin.productReview.productReview-message')
            </div><!-- /.panel.review-list-item -->
    @endforeach
    <!-- /.review-paper-body -->
        <!-- /.review-paper -->
    </div>
    <!-- /.review-wrapper -->
</div>