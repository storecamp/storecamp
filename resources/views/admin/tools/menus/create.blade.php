@extends('admin/app')
@section('breadcrumb')
    {!! Breadcrumbs::render('menus', 'Menus') !!}
@endsection
@section('contentheader_description')
    @include('admin.partial._content-head_btns', [$routeName = "admin::menus::index", $createBtn = 'All Menus'])
@endsection
@section('main-content')
    @include('admin.tools.menus.form')
@stop
