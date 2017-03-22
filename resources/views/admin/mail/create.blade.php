@extends('admin/app')
@section('breadcrumb')
    {{--{{ Breadcrumbs::render('admin') }}--}}
    {!! Breadcrumbs::render('attributes', 'Attributes') !!}
@endsection
@section('contentheader_title')
    Create Attribute
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
            </ul>
            <div class="tab-content">

                <iframe src="{!! route('admin::mail::showFrame') !!}" id="mail-iframe" height="100%" width="100%"
                        scrolling="yes"
                        frameborder="0"></iframe>
            </div>
        </div>
    </div>
@endsection
@section('scripts-add')
    <script>
        parent.document.getElementById('mail-iframe').style.height = document['body'].offsetHeight+100 + 'px';
    </script>
@endsection