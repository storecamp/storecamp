<?php $model = ''; ?>{{--specify the model here--}}
@extends('admin.app')
    @section('contentheader_title')
        Edit orders
    @endsection
    @section('contentheader_description')
        <b>{{ link_to_route("admin::orders::index", 'Back') }}</b>
    @endsection
@section('main-content')
    {{ Form::model($model, ['route' => ["admin::orders::update", $model], 'method' => 'PUT', 'class' => '']) }}
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#general" data-toggle="tab">General</a></li>
            <li><a href="#extra" data-toggle="tab">Extra</a></li>
        </ul>
        <div class="tab-content">
            @include("admin.orders.form", [$model])
        </div>
        <!-- /.tab-content -->
    </div>
    {{ Form::close() }}
@endsection