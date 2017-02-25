<?php $model = ''; ?>{{--specify the model here--}}
@extends('admin.app')
    @section('breadcrumb')
        {{--{{ Breadcrumbs::render('', '') }}--}}
    @endsection
    @include('admin.partial._contentheader_title', [$model, $message = "All orders's'])
    @section('contentheader_description')
        <b>{{ link_to_route("admin::orders::create", 'Add New orders') }}</b>
    @endsection
@section('main-content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            {{--do something--}}
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
