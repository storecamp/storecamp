<!--Item slider text-->
<div class="container">
    <div class="row slider-text">
        <div class="col-md-6">
            <h2>Top Products in Category</h2>
        </div>
    </div>
</div>
<!-- Item slider-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="carousel carousel-most-viewed slide" id="itemslider">
                <div class="carousel-inner">
                    <?php $countViewed = count($mostViewed); ?>
                    @forelse($mostViewed as $product)
                        @if ($loop->first)
                            <div class="item active">
                                <div class="col-xs-12 col-sm-6 col-md-2">
                                    <a target="_blank" href="{{route('site::products::show', $product->unique_id)}}">
                                        <?php $mainImage = $product->getMedia('gallery')->first(); ?>
                                        <img src="{{$mainImage ? $mainImage->getUrl() : asset("/img/Image-not-found.gif")}}"
                                             class="img-responsive center-block"/>
                                    </a>
                                    <h4 class="text-center">{{$product->title}}</h4>
                                    <h5 class="text-center">{{shopFormat($product->price)}}</h5>
                                </div>
                            </div>
                        @else
                            <div class="item">
                                <div class="col-xs-12 col-sm-6 col-md-2">
                                    <a target="_blank" href="{{route('site::products::show', $product->unique_id)}}">
                                        <?php $mainImage = $product->getMedia('gallery')->first(); ?>
                                        <img src="{{$mainImage ? $mainImage->getUrl() : asset("/img/Image-not-found.gif")}}"
                                             class="img-responsive center-block"/>
                                    </a>
                                    <h4 class="text-center">{{$product->title}}</h4>
                                    <h5 class="text-center">{{shopFormat($product->price)}}</h5>
                                </div>
                            </div>
                        @endif
                    @empty
                        <h3 class="text-muted">No More Products In This Category</h3>
                    @endforelse
                </div>
                <div id="slider-control">
                    <a class="left carousel-control" href="#itemslider" data-slide="prev"><img
                                src="https://s12.postimg.org/uj3ffq90d/arrow_left.png" alt="Left"
                                class="img-responsive"></a>
                    <a class="right carousel-control" href="#itemslider" data-slide="next"><img
                                src="https://s12.postimg.org/djuh0gxst/arrow_right.png" alt="Right"
                                class="img-responsive"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Item slider end-->

@push('scripts-add_on')
<script>
    (function () {

        $('#itemslider').carousel({interval: 3000});
    }());

    (function () {
        $('.carousel-most-viewed .item').each(function () {
            var itemToClone = $(this);

            for (var i = 1; i < {!!$countViewed!!}; i++) {
                itemToClone = itemToClone.next();
                if (!itemToClone.length) {
                    itemToClone = $(this).siblings(':first');
                }
                itemToClone.children(':first-child').clone()
                    .addClass("cloneditem-" + (i))
                    .appendTo($(this));
            }
        });
    }());
</script>
@endpush