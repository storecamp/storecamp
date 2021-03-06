@extends('app')
@section('htmlheader_title')
    Cart
@endsection
@section('breadcrumbs')
    {!! Breadcrumbs::render('Carts', 'carts') !!}
@endsection
@section('contentheader_title')
@endsection
@section('main-content')
    <div class="row">
        <div class="cart">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> Actions </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $row)
                        @if ($row->product)
                            <tr>
                            <td class="">
                                <div class="media">
                                    <a class="thumbnail pull-left" href="{{route('site::products::show', $row->id)}}">
                                        <?php
                                            $productMedia = $row->product->getMedia('gallery');
                                        ?>
                                        <img class="media-object"
                                             src="{{$productMedia->count() ? $productMedia->first()->getUrl() : asset("/img/Image-not-found.gif")}}"
                                             style="width: 72px; height: 72px;"></a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="{{route('site::products::show', $row->id)}}">{{$row->product->title}}</a></h4>
                                        {{--<h5 class="media-heading"> by <a href="#"></a></h5>--}}
                                        <span>Status: </span><span
                                                class="text-success"><strong>{{$row->product->getStockStatus() ?? 'no status'}}</strong></span>
                                    </div>
                                </div>
                            </td>
                            <td class="" style="text-align: center">
                                {!! Form::open([ 'method' => 'PUT', 'id' => 'update-item'.$row->rowId, 'route' => ['site::cart::update', $row->rowId]]) !!}
                                <input type="number" name="quantity" class="form-control cart-number"
                                       onchange="this.form.submit()"
                                       value="{{$row->qty}}">
                                {!! Form::close() !!}
                            </td>
                            <td class="text-center"><strong>{{ shopFormat($row->price) }}</strong></td>
                            <td class="text-center"><strong>{{ shopFormat($row->total) }}</strong></td>
                            <td class="">
                                {!! Form::open([ 'method' => 'PUT', 'id' => 'remove-item'.$row->rowId, 'route' => ['site::cart::remove', $row->rowId]]) !!}
                                <button type="button" onclick="event.preventDefault();
                                        document.getElementById('remove-item{{$row->rowId}}').submit();"
                                        class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove"></span> Remove
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @else
                            <h3 class="text-center text-warning">Sorry product not found</h3>
                        @endif
                    @endforeach
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>{{ $cartSystem->subtotal() }}</strong></h5></td>
                    </tr>
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td><h5>Tax</h5></td>
                        <td class="text-right"><h5><strong>{{ $cartSystem->tax() }}</strong></h5></td>
                    </tr>
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>{{ $cartSystem->total() }}</strong></h3></td>
                    </tr>
                    <tr>
                        <td>
                            @if($cart->count())
                                {!! Form::open([ 'method' => 'DELETE', 'id' => 'clear-cart', 'route' => ['site::cart::delete']]) !!}
                                <button onclick="event.preventDefault();
                                    document.getElementById('clear-cart').submit();" type="button"
                                        class="btn btn-warning">
                                    <span class="fa fa-close"></span> Clear cart
                                </button>
                                {!! Form::close() !!}
                            @endif 
                        </td>
                        <td>  </td>
                        <td></td>
                        <td>
                            <a href="#" type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                            </a>
                        </td>
                        <td>
                            <a href="{{route('site::order::index')}}" type="button" class="btn btn-success">
                                Checkout <span class="glyphicon glyphicon-play"></span>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection