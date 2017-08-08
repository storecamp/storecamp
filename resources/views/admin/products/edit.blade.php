@extends('admin/app')
@section('contentheader_title')
    Edit product
@endsection
@section('contentheader_description')
    @include('admin.partial._content-head_btns', [$routeName = "admin::products::index", $createBtn = 'Back', $showFilters = false])
    <a role="button" class="btn btn-default" aria-haspopup="true"
       target="_blank" href="{!! route('site::products::show', [$product->unique_id]) !!}" class="btn">Site
        View</a>
@endsection
@section('main-content')
    <div>
        @include('admin.products.form')
    </div>
@endsection