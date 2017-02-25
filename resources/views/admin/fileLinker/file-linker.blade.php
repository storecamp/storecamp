<div class="col-xs-7 col-sm-7 col-md-8 col-lg-9 files">
    <span class="navigation-links">
        @include('admin.fileLinker.navigation_path')
    </span>
    <div class="clearfix"></div>
    <?php $tag = isset($tag) ? $tag : null; ?>
    @foreach(array_chunk($media->all(), 4) as $row)
        <div class="row file-list">
            @foreach($row as $file)
                @if($file->aggregate_type == "video")
                    @include('admin.fileLinker.fileLinker-item', [$icon = 'item-icon fa fa-video-camera', $file])
                @elseif($file->aggregate_type == "image")
                    @include('admin.fileLinker.fileLinker-item', [$icon = 'item-icon fa fa-image', $file])
                @elseif($file->aggregate_type == 'audio')
                    @include('admin.fileLinker.fileLinker-item', [$icon = 'item-icon fa fa-file-audio-o', $file])
                @elseif($file->aggregate_type == 'archive')
                    @include('admin.fileLinker.fileLinker-item', [$icon = 'item-icon fa fa-archive', $file])
                @elseif($file->aggregate_type == 'document')
                    @include('admin.fileLinker.fileLinker-item', [$icon = 'item-icon fa fa-file-word-o', $file])
                @elseif($file->aggregate_type == 'pdf')
                   @include('admin.fileLinker.fileLinker-item', [$icon = 'item-icon fa fa-file-pdf-o', $file])
                @endif
            @endforeach
        </div>
        @if($media->count() == 0)
            <h3 class="text-warning">No Files found</h3>
        @endif
    @endforeach
</div>
<div class="col-xs-5 col-sm-5 col-md-4 col-lg-3 directories">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Folders</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-plus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="display: block;">

            @foreach($directories as $directory)
                <div class="col-xs-12 col-md-6 directory-item">
                    <a class="btn btn-app select-folder"
                       type="select"
                       role="checkbox"
                       data-folder-url="{{ route('admin::media::file_linker', [$disk, $directory->unique_id]) }}"
                       data-folder-id="{{ $directory->unique_id }}">
                        <i class='fa fa-file'></i>
                        <span>{{str_limit($directory['name'], 15)}}</span>
                        @if($directory->locked)
                            <span rel="tooltip" title="Folder Locked" data-toggle="tooltip"
                                  data-container="body"
                                  class="locked-file text-info btn-xs" role="button">
                                <span class="fa fa-key" aria-hidden="true"></span>
                            </span>
                        @endif
                    </a>
                </div>
            @endforeach
            @if($directories->count() == 0)
                <h3 class="text-warning">No folders found</h3>
            @endif
        </div>
        <!-- /.box-body -->
    </div>
</div>
<div class="clearfix"></div>
<script>
    $('input[type="checkbox"].selectedFile, input[type="radio"].selectedFile').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
</script>