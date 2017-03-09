<?php $model = ''; ?>{{--specify the model here--}}
@extends('admin.app')
    @section('contentheader_title')
        Create new pages
    @endsection
    @section('contentheader_description')

        <b>{!! link_to_route("admin::pages::index", 'Back') !!}</b>
    @endsection
@section('main-content')
    <div>
        {!! Form::open(['files' => true, 'route' => "admin::pages::store"]) !!}
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#general" data-toggle="tab">General</a></li>
                <li><a href="#extra" data-toggle="tab">Extra</a></li>
            </ul>
            <div class="tab-content">
                @include("admin.pages.form", [])
            </div>
            <!-- /.tab-content -->
        </div>
        {!! Form::close() !!}
    </div>
@endsection