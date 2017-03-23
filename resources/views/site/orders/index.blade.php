@extends('app')
@section('htmlheader_title')
    Order Checkout
@endsection
@section('breadcrumbs')
@endsection
@section('contentheader_title')
@endsection

@section('main-content')
    <div class="row">
        <div class="orders">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <ul class="breadcrumb">
                            @if($status == "showPersonal")
                                <li class="active">
                                    <a href="javascript:void(0);">Personal Contact</a>
                                </li>
                            @else
                                @if(in_array("showPersonal", $getAllPreviousValue))
                                    <li class="completed">
                                        <a href="javascript:void(0);">Personal Contact</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="javascript:void(0);">Personal Contact</a>
                                    </li>
                                @endif
                            @endif
                            @if($status == "showAddress")
                                <li class="active">
                                    <a href="javascript:void(0);">Address/Delivery</a>
                                </li>
                            @else
                                @if(in_array("showAddress", $getAllPreviousValue))
                                    <li class="completed">
                                        <a href="javascript:void(0);">Address/Delivery</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="javascript:void(0);">Address/Delivery</a>
                                    </li>
                                @endif
                            @endif
                            @if($status == "showShipping")
                                <li class="active">
                                    <a href="javascript:void(0);">Shipping</a>
                                </li>
                            @else
                                @if(in_array("showShipping", $getAllPreviousValue))
                                    <li class="completed">
                                        <a href="javascript:void(0);">Shipping</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="javascript:void(0);">Shipping</a>
                                    </li>
                                @endif
                            @endif
                            @if($status == "showPayment")
                                <li class="active">
                                    <a href="javascript:void(0);">Payment</a>
                                </li>
                            @else
                                @if(in_array("showPayment", $getAllPreviousValue))
                                    <li class="completed">
                                        <a href="javascript:void(0);">Payment</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="javascript:void(0);">Payment</a>
                                    </li>
                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
                @if($status == "showPersonal")
                    @include('site.orders._personal-data')
                @endif
                @if($status == "showAddress")
                    @include('site.orders._address')
                @endif
                @if($status == "showShipping")
                    @include('site.orders._shipment')
                @endif
                @if($status == "showPayment")
                    @include('site.orders._payment')
                @endif
            </div>
        </div>
    </div>
@endsection