@extends('admin/app')
    @section('contentheader_title')
        Edit Category        &middot;
    @endsection
    @section('contentheader_description')
        @include('admin.partial._content-head_btns', [$routeName = "admin::categories::index", $createBtn = 'Back', $showFilters = false])
    @endsection
@section('main-content')
    {{ Form::model($category, ['route' => ['admin::categories::update', $category->unique_id], 'method' => 'PUT', 'class' => '']) }}
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#general" data-toggle="tab">General</a></li>
            <li><a href="#extra" data-toggle="tab">Extra</a></li>
        </ul>
        <div class="tab-content">
            @include('admin.categories.form', [$category, $parent])
        </div>
        <!-- /.tab-content -->
    </div>
    {{ Form::close() }}
@endsection
