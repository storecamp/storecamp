@extends('admin/app')
@section('breadcrumb')
    {!! \Breadcrumbs::render('settings', 'Settings') !!}
@endsection
@include('admin.partial._contentheader_title', [$model = new \App\Core\Models\Currency(), $message = "All Currencies Count"])
@section('contentheader_description')
    @include('admin.partial._content-head_btns', [$routeName = "admin::settings::currency::index", $createBtn = 'All Currencies'])
@endsection
@section('main-content')
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#general" data-toggle="tab">General</a></li>
            {{--<li><a href="#extra" data-toggle="tab">Extra</a></li>--}}
        </ul>
        <div class="tab-content">
            {!! Form::model($currency, ['method' => 'PUT', 'route' => ['admin::settings::currency::update', $currency->id]]) !!}
            @include('admin.settings.currencies.form-body')
            {!! Form::submit('Update', ['class' => 'btn btn-info']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

