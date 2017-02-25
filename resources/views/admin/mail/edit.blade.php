@extends('admin/app')
    @section('breadcrumb')
        {{--{{ Breadcrumbs::render('admin') }}--}}
        {!! Breadcrumbs::render('attributes', 'Attributes') !!}
    @endsection
    @section('contentheader_title')
        Edit Attribute
    @endsection
    @section('contentheader_description')
        &middot;
        <b>{{ link_to_route('admin::attributes::index', 'Back') }}</b>
    @endsection
@section('main-content')
    <div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#general" data-toggle="tab">General</a></li>
                {{--<li><a href="#extra" data-toggle="tab">Extra</a></li>--}}
            </ul>
            <div class="tab-content">
                @include('admin.mail.form', array('model' => $mail))
        {{--@include('admin.users.form')--}}
            </div>
            <!-- /.tab-content -->
        </div>
    </div>
@endsection