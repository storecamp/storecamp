@extends('app')
@section('htmlheader_title')
    Order Checkout
@endsection
@section('breadcrumbs')
    {!! Breadcrumbs::render('Order', 'order') !!}
@endsection
@section('contentheader_title')
@endsection

@section('main-content')
    <div class="row">
        <div class="orders">
            <div class="col-md-12">
                @if($showPersonal??false)
                    @include('site.orders._personal-data')
                @endif
                @if($showAddress??false)
                    @include('site.orders._address')
                @endif
            </div>
        </div>
    </div>
@endsection