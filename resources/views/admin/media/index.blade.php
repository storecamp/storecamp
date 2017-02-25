@extends('admin/app')
    @section('breadcrumb')
        {!! Breadcrumbs::render('media', $disk) !!}
    @endsection
        @include('admin.partial._contentheader_title', [$model = $media["media"], $message = "Amount of Media Files"])
    @section('contentheader_description')
                @include('admin.media.navigation_path')
    @endsection
@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List of Media Files</h3>
                    <div class="box-tools">
                        <div class="form-group">
                            @if(!$folder)
                                <a class="btn btn-xs btn-default" href="{{route('admin::media::index', [$disk])}}"
                                   style="margin-left: 10px">
                                    back
                                </a>
                            @else
                                <a class="btn btn-xs btn-default" href="{{url()->previous()}}"
                                   style="margin-left: 10px">
                                    back
                                </a>
                            @endif
                            <a data-toggle="modal"
                               href="#upload-modal"
                               class="btn btn-xs btn-default" style="margin-left: 10px">
                                upload
                            </a>
                            <a data-toggle="modal"
                               href="#newdir-modal"
                               class="btn btn-xs btn-default" style="margin-left: 10px">
                                create directory
                            </a>

                            @include('admin.partial._box_search')
                        </div>
                    </div>
                    <div class="clearifx"></div>
                    <span class="media_tags">
                           <span class="text-muted">only: </span>
                        <li>
                    <a href="{{route('admin::media::index',[$disk, $folder->unique_id])}}" class="btn btn-xs btn-icon" style="margin-left: 10px">
                        - all
                    </a>
                        </li>
                        <li>
                            <a href="{{route('admin::media::index',[$disk, $folder->unique_id])."?tag=video"}}" class="btn btn-xs btn-icon"
                               style="margin-left: 10px">
                        <i class="fa fa-video-camera"></i> - video
                    </a>
                        </li>

                        <li>
                             <a href="{{route('admin::media::index',[$disk, $folder->unique_id])."?tag=audio"}}" class="btn btn-xs btn-icon"
                                style="margin-left: 10px">
                        <i class="fa fa-music"></i> - audio
                    </a>
                        </li>
                        <li>
                              <a href="{{route('admin::media::index',[$disk, $folder->unique_id])."?tag=image"}}" class="btn btn-xs btn-icon"
                                 style="margin-left: 10px">
                        <i class="fa fa-image"></i> - image
                    </a>
                        </li>
                        <li>
                            <a href="{{route('admin::media::index',[$disk, $folder->unique_id])."?tag=pdf"}}" class="btn btn-xs btn-icon"
                               style="margin-left: 10px">
                        <i class="fa fa-file-pdf-o"></i> - pdf
                    </a>
                        </li>
                        <li>
                             <a href="{{route('admin::media::index',[$disk, $folder->unique_id])."?tag=archive"}}" class="btn btn-xs btn-icon"
                                style="margin-left: 10px">
                        <i class="fa fa-file-archive-o"></i> - archive
                    </a>
                        </li>
                        <li>
                            <a href="{{route('admin::media::index',[$disk, $folder->unique_id])."?tag=document"}}" class="btn btn-xs btn-icon"
                               style="margin-left: 10px">
                        <i class="fa fa-file-archive-o"></i> - document
                    </a>
                        </li>

                    </span>
                </div><!-- /.box-header -->
                {{ Form::open(['files' => true, 'route' => ['admin::media::upload', $disk],
                'id' => 'my-awesome-dropzone-body', 'class' => 'dropzone box-body folder-body']) }}
                <input type="hidden" name="folder" value="{{$folder->unique_id}}">
                @include('admin.media.index-body_part')
                {{ Form::close() }}
            </div><!-- /.box -->
            <div class="text-center">
                {{ $media["media"]->links() }}
            </div>
        </div>
    </div>
@endsection
@section('scripts_add')
    <script src="{{ asset('custom_vendors/media-js/jquery.media.js') }}"></script>
@endsection
@include('admin.media.upload-modal')
@include('admin.media.newdir-modal')
@include('admin.media.rename-dir-modal')
@include('admin.media.rename-file-modal')
