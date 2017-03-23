@extends('admin/app')
@section('breadcrumb')
    {!! Breadcrumbs::render('media', $disk) !!}
@endsection
@include('admin.partial._contentheader_title', [$model = $media["media"], $message = "Amount of Media Files"])
@section('contentheader_description')
    @include('admin.media.navigation_path')
@endsection
@section('main-content')

    {{--Block for chunked uploads--}}
    <div class="hidden">
        <div id="current-container">
            <button type="button" id="upload-browse-button" class="upload-browse-button btn btn-primary">Browse...
            </button>
            <button type="button" id="uploadfiles" class="upload-start-upload btn btn-success">Upload</button>
        </div>
        <div id="uploader">Your browser doesn't support native upload.</div>
    </div>

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
                    <a href="{{route('admin::media::index',[$disk, $folder->unique_id])}}" class="btn btn-xs btn-icon"
                       style="margin-left: 10px">
                        - all
                    </a>
                        </li>
                        <li>
                            <a href="{{route('admin::media::index',[$disk, $folder->unique_id])."?tag=video"}}"
                               class="btn btn-xs btn-icon"
                               style="margin-left: 10px">
                        <i class="fa fa-video-camera"></i> - video
                    </a>
                        </li>

                        <li>
                             <a href="{{route('admin::media::index',[$disk, $folder->unique_id])."?tag=audio"}}"
                                class="btn btn-xs btn-icon"
                                style="margin-left: 10px">
                        <i class="fa fa-music"></i> - audio
                    </a>
                        </li>
                        <li>
                              <a href="{{route('admin::media::index',[$disk, $folder->unique_id])."?tag=image"}}"
                                 class="btn btn-xs btn-icon"
                                 style="margin-left: 10px">
                        <i class="fa fa-image"></i> - image
                    </a>
                        </li>
                        <li>
                            <a href="{{route('admin::media::index',[$disk, $folder->unique_id])."?tag=pdf"}}"
                               class="btn btn-xs btn-icon"
                               style="margin-left: 10px">
                        <i class="fa fa-file-pdf-o"></i> - pdf
                    </a>
                        </li>
                        <li>
                             <a href="{{route('admin::media::index',[$disk, $folder->unique_id])."?tag=archive"}}"
                                class="btn btn-xs btn-icon"
                                style="margin-left: 10px">
                        <i class="fa fa-file-archive-o"></i> - archive
                    </a>
                        </li>
                        <li>
                            <a href="{{route('admin::media::index',[$disk, $folder->unique_id])."?tag=document"}}"
                               class="btn btn-xs btn-icon"
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
@section('scripts-add')
    <!-- Load plupload and all it's runtimes and finally the UI widget -->
    <link rel="stylesheet"
          href="{!! asset('custom_vendors/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css') !!}"
          type="text/css"/>
    <script src="{{ asset('custom_vendors/media-js/jquery.media.js') }}"></script>
    <script type="text/javascript" src="{!! asset('custom_vendors/plupload/js/plupload.min.js') !!}"></script>
    <script type="text/javascript"
            src="{!! asset('custom_vendors/plupload/js/jquery.plupload.queue/jquery.plupload.queue.min.js') !!}"></script>
    <script type="text/javascript">
        $(function () {
            // Setup html5 version
            var uploader = $("#uploader").pluploadQueue({
                // General settings
                runtimes: 'html5',
                url: "{{route('admin::media::upload', [$disk])}}",
                chunk_size: '2mb',
                unique_names: true,
                browse_button: "upload-browse-button",
                filters: {
                    max_file_size: '2048mb',
                },
                headers: {
                    "Accept": "application\/json",
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                // Resize images on clientside if we can
                resize: {width: 320, height: 240, quality: 90},
                // Post init events, bound after the internal events
                init: {
                    PostInit: function () {
                        // Called after initialization is finished and internal event handlers bound
                        log('[PostInit]');
                        document.getElementById('uploadfiles').onclick = function () {
                            uploader.find('.plupload_button.plupload_start').trigger('click');
                            return false;
                        }
                    },

                    Browse: function (up) {
                        // Called when file picker is clicked
                        log('[Browse]');
                    },

                    Refresh: function (up) {
                        // Called when the position or dimensions of the picker change
                        log('[Refresh]');
                    },

                    StateChanged: function (up) {
                        // Called when the state of the queue is changed
                        log('[StateChanged]', up.state == plupload.STARTED ? "STARTED" : "STOPPED");
                    },

                    QueueChanged: function (up) {
                        // Called when queue is changed by adding or removing files
                        log('[QueueChanged]');
                    },

                    OptionChanged: function (up, name, value, oldValue) {
                        // Called when one of the configuration options is changed
                        log('[OptionChanged]', 'Option Name: ', name, 'Value: ', value, 'Old Value: ', oldValue);
                    },

                    BeforeUpload: function (up, file) {
                        // Called right before the upload for a given file starts, can be used to cancel it if required
                        log('[BeforeUpload]', 'File: ', file);
                    },

                    UploadProgress: function (up, file) {
                        // Called while file is being uploaded
                        log('[UploadProgress]', 'File:', file, "Total:", up.total);
                    },

                    FileFiltered: function (up, file) {
                        // Called when file successfully files all the filters
                        log('[FileFiltered]', 'File:', file);
                    },

                    FilesAdded: function (up, files) {
                        // Called when files are added to queue
                        log('[FilesAdded]');

                        plupload.each(files, function (file) {
                            log('  File:', file);
                        });
                    },

                    FilesRemoved: function (up, files) {
                        // Called when files are removed from queue
                        log('[FilesRemoved]');

                        plupload.each(files, function (file) {
                            log('  File:', file);
                        });
                    },

                    FileUploaded: function (up, file, info) {
                        // Called when file has finished uploading
                        log('[FileUploaded] File:', file, "Info:", info);
                    },

                    ChunkUploaded: function (up, file, info) {
                        // Called when file chunk has finished uploading
                        log('[ChunkUploaded] File:', file, "Info:", info);
                    },

                    UploadComplete: function (up, files) {
                        // Called when all files are either uploaded or failed
                        log('[UploadComplete]');
                    },

                    Destroy: function (up) {
                        // Called when uploader is destroyed
                        log('[Destroy] ');
                    },

                    Error: function (up, args) {
                        // Called when error occurs
                        log('[Error] ', args);
                    }
                }
            });

            function log() {
                var str = "";

                plupload.each(arguments, function (arg) {
                    var row = "";

                    if (typeof(arg) != "string") {
                        plupload.each(arg, function (value, key) {
                            // Convert items in File objects to human readable form
                            if (arg instanceof plupload.File) {
                                // Convert status to human readable
                                switch (value) {
                                    case plupload.QUEUED:
                                        value = 'QUEUED';
                                        break;

                                    case plupload.UPLOADING:
                                        value = 'UPLOADING';
                                        break;

                                    case plupload.FAILED:
                                        value = 'FAILED';
                                        break;

                                    case plupload.DONE:
                                        value = 'DONE';
                                        break;
                                }
                            }

                            if (typeof(value) != "function") {
                                row += (row ? ', ' : '') + key + '=' + value;
                            }
                        });

                        str += row + " ";
                    } else {
                        str += arg + " ";
                    }
                });
            }

            uploader.init();

        });
    </script>
@endsection
@include('admin.media.upload-modal')
@include('admin.media.newdir-modal')
@include('admin.media.rename-dir-modal')
@include('admin.media.rename-file-modal')
@include('admin.media.delete-file-modal')
