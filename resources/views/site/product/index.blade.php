@extends('app')
@section('htmlheader_title')
    Products
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
        @forelse($products as $product)
            <div class="col-md-4">
                <div class="product-item">
                    <div class="item-img-wrapper">
                        @if ($product->getMedia('gallery')->count())
                            <?php $mainImage = $product->getMedia('gallery')->first(); ?>
                            <img {{ $product->title }} class="img-responsive"
                                 src="{{$mainImage ? $mainImage->getUrl() : asset("/img/Image-not-found.gif")}}"/>
                        @else
                            <img alt="{!! $product->title !!}" class="img-responsive"
                                 src="{{asset("/img/Image-not-found.gif")}}"/>
                        @endif
                        <div>
                            <a href="#" class="btn">Preview</a>
                            <a href="{!! route('site::products::show', [$product->unique_id]) !!}" class="btn">Full
                                View</a>
                        </div>
                    </div>
                    <h3>
                        <a href="{!! route('site::products::show', [$product->unique_id]) !!}">{!! $product->title !!}</a>
                    </h3>
                    <div class="item-price">${!! $product->price !!}</div>
                    <span class="product-description">
                          {!! $product->description !!}
                        </span>
                    {!! Form::open(['class' => 'form-group', 'method' => 'PUT', 'files' => false, 'route' => ['site::cart::add', $product->unique_id]]) !!}
                    <input type="submit" class="btn add2cart" value="Add to cart">
                    {!! Form::close() !!}
                </div>
            </div>
        @empty
            <h2 class="text-muted text-center">Sorry</h2>
            <h3 class="text-warning text-center">No Products Found</h3>
        @endforelse
        <div class="clearfix"></div>
        <div class="text-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection