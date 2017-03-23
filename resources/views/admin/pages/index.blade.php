<?php $model = $pages; ?>{{--specify the model here--}}
@extends('admin.app')
    @section('breadcrumb')
        {{--{!! Breadcrumbs::render('', '') !!}--}}
    @endsection
    @include('admin.partial._contentheader_title', [$model, $message = "All pages'])
    @section('contentheader_description')
        <b>{!! link_to_route("admin::pages::create", 'Add New Page') !!}</b>
    @endsection
@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List of pages</h3>
                    <div class="box-tools">
                        @include('admin.partial._box_search')
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th class="text-center">Actions</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
    <div class="text-center">
        {{--{!! $model->links() !!}--}}
    </div>
@endsection
@section('scripts-add')
@endsection