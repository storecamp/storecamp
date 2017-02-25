@extends('admin/app')
    @section('contentheader_title')
        Edit Role
    @endsection
    @section('contentheader_description')
            @include('admin.partial._content-head_btns', [$routeName = "admin::roles::index", $createBtn = 'Back', $showFilters = false])
    @endsection
@section('main-content')
    <div>
        @include('admin.roles.form')
    </div>
@endsection
