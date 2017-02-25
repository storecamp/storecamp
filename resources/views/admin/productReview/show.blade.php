@extends('admin/app')
    @section('breadcrumb')
        {!! Breadcrumbs::render('reviews', 'reviews') !!}
    @endsection
    @section('contentheader_title')
        All Product Reviews
    @endsection
    @section('contentheader_description')
            @include('admin.partial._content-head_btns', [$routeName = "admin::reviews::index", $createBtn = 'Back'])
    @endsection
@section('main-content')
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#general" data-toggle="tab">General</a></li>
        </ul>
        <div class="tab-content">
    @include('admin.productReview.review_body', [$productReviews = [$productReview]])
        </div>
    </div>
@endsection
@section('scripts-add')
    <script>
        $('.review-item-status.read').on({
            "click": function (event) {
                console.log("button clicked");
                var feedId = $(this).closest(".review-list-item").data('feed-id'),
                    feedStatus = $(this).closest(".review-list-item").data('feed-status');

                if (feedStatus == false) {
                    $.ajax({
                        type: 'GET',
                        url: APP_URL + "/admin/reviews/markasread/productReview/" + feedId,
//                        data: {
//                            'class_name': _this.o.class_name,
//                            'object_id': _this.o.object_id
//                        },
                        success: function (data) {
                            if (data['error']) {

                                console.log(data);
                            }
                            console.log(data);
                            if (data['message']) {
                                var navButton = $("li.productReview");
                                var itemLabelStatus = $('.review-list-item[data-feed-id=' + feedId + '] .review-item-status.read');
                                navButton.find('span').text(data['messages_count']);
                                var sidebarstatus = $('.sidebar .review-item-status');
                                sidebarstatus.text(data['messages_count']);
                                itemLabelStatus.text('read');
                                if (data['messages_count'] == 0) {
                                    navButton.find('span').removeClass('label-danger').addClass('label-default');
                                    sidebarstatus.removeClass('label-warning').addClass('label-default');
                                }
                                itemLabelStatus.removeClass('label-warning').addClass('label-default');
                            }
                        },
                        error: function (data) {
                            console.log('error' + '   ' + data);
                        }
                    }, 'html');
                }
            }
        });
    </script>
@endsection