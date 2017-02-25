@extends('admin/app')
    @section('contentheader_title')
        Create new Category
    @endsection
    @section('contentheader_description')
            @include('admin.partial._content-head_btns', [$routeName = "admin::categories::index", $createBtn = 'Back', $showFilters = false])
    @endsection
@section('main-content')
    <div>
        {{ Form::open(['files' => true, 'route' => 'admin::categories::store']) }}
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#general" data-toggle="tab">General</a></li>
                <li><a href="#extra" data-toggle="tab">Extra</a></li>
            </ul>
            <div class="tab-content">
                @include('admin.categories.form', [$category=null])
            </div>
            <!-- /.tab-content -->
        </div>
        {{ Form::close() }}
    </div>
@endsection