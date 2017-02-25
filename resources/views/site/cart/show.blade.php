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
                        <tr>
                            <td class="">
                                <div class="media">
                                    <a class="thumbnail pull-left" href="#">
                                        <img class="media-object"
                                             src="{{$row->options->has('thumb') ? $row->options->thumb : ''}}"
                                             style="width: 72px; height: 72px;"> </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="#">{{$row->name}}</a></h4>
                                        {{--<h5 class="media-heading"> by <a href="#">Brand name</a></h5>--}}
                                        <span>Status: </span><span
                                                class="text-success"><strong>{{$row->options->has('status') ? $row->options->status : 'no status'}}</strong></span>
                                    </div>
                                </div>
                            </td>
                            <td class="" style="text-align: center">
                                <input type="number" class="form-control" id="cart-number"
                                       value="{{$row->qty}}">
                            </td>
                            <td class="text-center"><strong>${{ $row->price }}</strong></td>
                            <td class="text-center"><strong>${{ $row->total }}</strong></td>
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
                    @endforeach
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>${{ $cartSystem->subtotal() }}</strong></h5></td>
                    </tr>
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td><h5>Tax</h5></td>
                        <td class="text-right"><h5><strong>${{$cartSystem->tax()}}</strong></h5></td>
                    </tr>
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>${{$cartSystem->total()}}</strong></h3></td>
                    </tr>
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td>
                            <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-success">
                                Checkout <span class="glyphicon glyphicon-play"></span>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection