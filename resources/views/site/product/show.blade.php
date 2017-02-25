@extends('app')
@section('htmlheader_title')
    {{$product->title}}
@endsection
@section('breadcrumbs')
    @if($category)
        {!! Breadcrumbs::render('Products', $category) !!}
    @else
        {!! Breadcrumbs::render('Products', 'products') !!}
    @endif
@endsection
@section('contentheader_title')
@endsection
@section('main-content')
    <div class="row">
        <div class="product">
            <div class="col-md-6">
                <div class="modal-show">
                    @if ($product->getMedia('gallery')->count())
                        <div class="product-images-list">
                            <div class="product-popup-gallery">
                                @foreach ($product->getMedia('gallery') as $image)
                                    <a href="{{$image->getUrl()}}" title="{{$product->title}}">
                                        <img class="" src="{{$image->getUrl()}}" width="75" height="75">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="product-main-img">
                            <?php $mainImage = $product->getMedia('gallery')->first(); ?>
                            <img src="{{$mainImage ? $mainImage->getUrl() : asset("/img/Image-not-found.gif")}}"/>
                        </div>
                    @else
                        <div class="product-images-list"></div>
                        <img src="{{asset("/img/Image-not-found.gif")}}"/>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                {!! Form::open(['class' => 'form-group', 'method' => 'PUT', 'files' => false, 'route' => ['site::cart::add', $product->unique_id]]) !!}
                <div class="product-title">
                    {{$product->title}}
                </div>
                <div class="col-md-2">
                    <div class="product-quantity">
                        <div class="label label-default">Quantity</div>
                        <input class="form-control" type="number" value="1" name="quantity">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="label label-default">Status</div>
                    <div class="product-status">{{ $product->getStockStatus() }}</div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <div class="product-review-counter">
                        <?php $ratingCounter = $product->getRatingCounter() ?>
                        @if(!empty($ratingCounter))
                            <span class="text-muted pull-left"><b>Product review point</b></span>
                            @include('admin.partial._rating', [$selected = $product->getRatingCounter(), $readOnly = true])
                            <span class="review-no">{{$product->getRatingCounter()}} reviews</span>
                        @else
                            <div type="text" class="product-quantity">
                                <span class="text-warning pull-left">no rating provided</span>
                                @include('admin.partial._rating', [$readOnly = true])
                                <span class="review-no">0 reviews</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-price-box">
                        <span class="text-muted">price</span> <span class="product-price"> {{ $product->price }}$</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-sku">{{ $product->sku }}</div>
                </div>
                <button class="btn btn-default product-add-to-cart"><em class="fa fa-cart-plus"></em> Add to cart
                </button>
                <hr>
                <div class="col-md-12">
                    <button class="btn btn-default product-add-to-wishList">Add to Wish List</button>
                    <button class="btn btn-default product-add-to-compare">Add to Compare</button>
                </div>
                <div class="col-md-12">
                <div class="product-social-sharing">
                    <ul class="product-social-list">
                        <li>
                            <span>Share</span>
                        </li>
                        <li>
                            <a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a class="btn btn-social-icon btn-vk"><i class="fa fa-vk"></i></a>
                        </li>
                        <li>
                            <a class="btn btn-social-icon btn-google"><i class="fa fa-google-plus"></i></a>
                        </li>
                    </ul>
                </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-lg-12">
                <div class="nav-tabs-custom product-tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#description" data-toggle="tab">Description</a></li>
                        <li class=""><a href="#reviews" data-toggle="tab">Reviews</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="description">
                            <p class="product-description">{!! $product->body !!}</p>
                        </div>
                        <div class="tab-pane" id="reviews">
                            <div class="product-reviews">
                                @foreach($product->productReview as $review)
                                    @include('site.partials.reviews.message', ['productReview' => $review])
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Nav tabs -->
            </div>
            @include('site.partials.slider')
        </div>
    </div>
@endsection