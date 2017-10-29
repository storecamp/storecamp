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
    <div>
        <div id="current-container">
            <button type="button" id="upload-browse-button" class="upload-browse-button btn btn-primary">Browse...
            </button>
            <button type="button" id="uploadfiles" class="upload-start-upload btn btn-success">Upload</button>
        </div>
        <div id="uploader" style="display: block"></div>
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
            var uploader = new plupload.Uploader({
                runtimes: 'html5',
                url: "{{route('admin::media::upload', [$disk])}}",
                chunk_size: '2mb',
                unique_names: true,
                browse_button: "upload-browse-button",
                filters: {
                    max_file_size: '2048mb',
                    mime_types: [
                        {title : "Image files", extensions : "jpg,gif,png"},
                        {title : "Archive files", extensions : "zip, rar, gz"},
                        {title : "Video files", extensions : "mp4, webm"},
                        {title : "Audio files", extensions : "aac,ogg,oga,mp3,wav"},
                        {title : "Image files", extensions : "png,jpg,gif,jpeg"},
                        {title : "Document files", extensions : "pdf,psd,docx,doc"}
                    ]
                },
                headers: {
                    "Accept": "application\/json",
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                // Resize images on clientside if we can
                resize: {width: 320, height: 240, quality: 90}
            });

            document.getElementById('uploadfiles').onclick = function() {
                uploader.start();
            };

            uploader.bind('Error', function(up, err) {
                console.log(err);
                toastr.error("\nError #" + err.status + ": " + JSON.parse(err.response).message);
            });

            uploader.bind('FileUploaded', function (up, file, info) {
                // do some chunk related stuff
                var folderBody = $('#folder-body');
                var folderBodyUrl = folderBody.data('folder-url');
                var result = JSON.parse(info.media).result;
                $.ajax({
                    url: folderBodyUrl,
                    type: 'GET',
                    success: function (data) {
                        folderBody.html(data);
                        $.StoreCamp.media.fileSystemEvents();
                        toastr.info('File uploaded by name: ' + result.filename, 'Success');
                        return;
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        toastr.error('Sorry error appeared', 'Error updating file list');
                        console.error(xhr);
                        return;
                    }
                });
            });
            uploader.bind('FilesAdded', function(up, files) {
                var html = '';
                plupload.each(files, function(file) {
                    html += '<li id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></li>';
                });
                document.getElementById('uploader').innerHTML += html;
            });

            uploader.bind('UploadProgress', function(up, file) {
                document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
            });
            uploader.bind('PostInit', function () {
                // Called after initialization is finished and internal event handlers bound
            });

            uploader.init();

        });
    </script>
@endsection
@include('admin.media.upload-modal')
@include('admin.media.newdir-modal')
@include('admin.media.rename-dir-modal')
@include('admin.media.rename-file-modal')
@include('admin.media.delete-file-modal')
