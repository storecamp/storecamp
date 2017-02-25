@extends('admin/app')
    @section('breadcrumb')
        {!! Breadcrumbs::render('reviews', 'reviews') !!}
    @endsection
    @section('contentheader_title')
        Edit Product Review
    @endsection
    @section('contentheader_description')
        @include('admin.partial._content-head_btns', [$routeName = "admin::reviews::index", $createBtn = 'Back', $showFilters = false])
    @endsection
@section('main-content')
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#general" data-toggle="tab">General</a></li>
        </ul>
        <div class="tab-content">
            @include('admin.productReview.form', [$productReview])
        </div>
    </div>
@endsection
