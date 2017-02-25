@if(isset($model))
    <?php $preferredTag = isset($preferredTag) ? $preferredTag : 'thumbnail'; ?>
    @foreach($model->getMedia($preferredTag) as $file)
        @if($file->aggregate_type == "video")
            @include('admin.fileLinker.file-linker_selected_item', [$icon = 'item-icon fa fa-video-camera', $file])
        @elseif($file->aggregate_type == "image")
            @include('admin.fileLinker.file-linker_selected_item', [$icon = 'item-icon fa fa-image', $file])
        @elseif($file->aggregate_type == 'audio')
            @include('admin.fileLinker.file-linker_selected_item', [$icon = 'item-icon fa fa-file-audio-o', $file])
        @elseif($file->aggregate_type == 'archive')
            @include('admin.fileLinker.file-linker_selected_item', [$icon = 'item-icon fa fa-archive', $file])
        @elseif($file->aggregate_type == 'document')
            @include('admin.fileLinker.file-linker_selected_item', [$icon = 'item-icon fa fa-file-word-o', $file])
        @elseif($file->aggregate_type == 'pdf')
            @include('admin.fileLinker.file-linker_selected_item', [$icon = 'item-icon fa fa-file-pdf-o', $file])
        @endif
    @endforeach
@endif