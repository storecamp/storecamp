<div class="col-xs-7 col-sm-7 col-md-8 col-lg-9 files">
    <?php $tag = isset($tag) ? $tag : null; ?>
                <div class="panel">
                    <div class="panel-body">
                        @foreach($media->all() as $file)
                            @if($file->aggregate_type == "video")
                                @include('admin.media.file-list_item', [$icon = 'item-icons fa fa-video-camera fa-2x', $file])
                            @elseif($file->aggregate_type == "image")
                                @include('admin.media.file-list_item', [$icon = 'item-icons fa fa-image fa-2x', $file])
                            @elseif($file->aggregate_type == 'audio')
                                @include('admin.media.file-list_item', [$icon = 'item-icons fa fa-file-audio-o fa-2x', $file])
                            @elseif($file->aggregate_type == 'archive')
                                @include('admin.media.file-list_item', [$icon = 'item-icons fa fa-archive fa-2x', $file])
                            @elseif($file->aggregate_type == 'document')
                                @include('admin.media.file-list_item', [$icon = 'item-icons fa fa-file-word-o fa-2x', $file])
                            @elseif($file->aggregate_type == 'pdf')
                                @include('admin.media.file-list_item', [$icon = 'item-icons fa fa-file-pdf-o fa-2x', $file])
                            @endif
                        @endforeach
                    </div><!-- /.panel-body -->
                </div>
        @if($media->count() == 0)
            <h3 class="text-warning">No Files found</h3>
        @endif
</div>