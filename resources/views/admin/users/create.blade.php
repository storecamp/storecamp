@extends('admin/app')
    @section('breadcrumb')
        {{--{{ Breadcrumbs::render('admin') }}--}}
        {!! Breadcrumbs::render('users', 'Users') !!}
    @endsection
    @section('contentheader_title')
        Create User
        @endsection
        @section('contentheader_description')
            @include('admin.partial._content-head_btns', [$routeName = "admin::users::index", $createBtn = 'Back', $showFilters = false])
        @endsection
@section('main-content')
    <div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#general" data-toggle="tab">General</a></li>
                {{--<li><a href="#extra" data-toggle="tab">Extra</a></li>--}}
            </ul>
            <div class="tab-content">
                @include('admin.users.form')
            </div>
        </div>
@endsection
