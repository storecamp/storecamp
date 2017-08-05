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
            <div class="owl-carousel owl-theme">
                <?php $countViewed = count($mostViewed); ?>
                @forelse($mostViewed as $product)
                    <div class="">
                        <a target="_blank" href="{{route('site::products::show', $product->unique_id)}}">
                            <?php $mainImage = $product->getMedia('gallery')->first(); ?>
                            <img src="{{$mainImage ? $mainImage->getUrl() : asset("/img/Image-not-found.gif")}}"
                                 class="img-responsive center-block"/>
                        </a>
                        <h4 class="text-center">
                            <a target="_blank" href="{{route('site::products::show', $product->unique_id)}}">
                                {{$product->title}}
                            </a>
                        </h4>
                        <h5 class="text-center">{{shopFormat($product->price)}}</h5>
                    </div>
                @empty
                    <div>
                        <h3 class="text-muted">No More Products In This Category</h3>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</div>
<!-- Item slider end-->
@push('scripts-add_on')
<link rel="stylesheet" href="{{asset('plugins/owl.carousel/dist/assets/owl.carousel.min.css')}}"/>
<script src="{{asset('plugins/owl.carousel/dist/owl.carousel.min.js')}}"></script>
<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: {!! $countViewed > 4 ? 4 : $countViewed !!},
        loop: true,
        autoWidth: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 3000,
        height: 200,
        autoplayHoverPause: true
    });
    $('.play').on('click', function () {
        owl.trigger('play.owl.autoplay', [1000])
    })
    $('.stop').on('click', function () {
        owl.trigger('stop.owl.autoplay')
    })
</script>
@endpush