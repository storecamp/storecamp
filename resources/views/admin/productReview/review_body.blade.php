<div class="tab-pane active" id="general">
    <div class="review-wrapper">
        <div class="review-control">
            <div class="p-2x"><a href="{{route('admin::reviews::index')}}" class="btn btn-block btn-info">Clear review
                    marks</a></div>
            <ul class="nav nav-tabs nav-stacked nav-contrast-red" role="tablist">
                <?php $colors = ['', 'text-red', 'text-orange', 'text-teal', 'text-blue']?>
                @foreach(config('rating') as $key => $rating)
                    <li>
                        <a href="{{route('admin::reviews::index')}}?search={{$key}}&searchFields=rating;"
                           aria-controls="review">
                            <span class="pull-right label label-default"></span>
                            <i class="fa fa-circle-o {{ $colors[$key-1] }} mr-2x"></i> {{$rating}}
                        </a>
                    </li>
                @endforeach
            </ul>
            <ul class="nav nav-tabs nav-stacked nav-contrast-red" role="tablist">
                <li>
                    <a href="{{route('admin::reviews::index')}}?search=1&searchFields=hidden;"
                       aria-controls="review">
                        <span class="pull-right label label-default"></span>
                        <i class="fa fa-eye-slash mr-2x"></i> show hidden
                    </a>
                </li>
            </ul>
            <!-- /nav-review -->
            <!-- /nav-label -->
        </div>
        <!-- /.review-control -->
        <div class="review-paper">
            <!-- /.review-paper-heading -->
                    @foreach($productReviews as $productReview)
                        <div class="review-list-item" data-fill-color="true" data-feed-id="{{$productReview->id}}"
                             data-feed-status="{{$productReview->comments->first()->isUnread($currentUserId) ? "false" : "true"}}">
                            @include('admin.productReview.productReview-message')
                        </div><!-- /.panel.review-list-item -->
                    @endforeach
            <!-- /.review-paper-body -->
            <!-- /.review-paper-footer -->
        </div>
        <!-- /.review-paper -->
    </div>
    <!-- /.review-wrapper -->
</div>