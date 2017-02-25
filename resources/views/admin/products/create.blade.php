@extends('admin/app')
@section('contentheader_title')
    Add New Product
@endsection
@section('contentheader_description')
    @include('admin.partial._content-head_btns', [$routeName = "admin::products::index", $createBtn = 'Back', $showFilters = false])
@endsection
@section('main-content')
    <div>
        @include('admin.products.form', [$categories, $chosenCategory])
    </div>
@endsection