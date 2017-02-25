<div class="media file-item" data-file-id="{{ $file->id }}"
     data-filename="{{ $file->filename }}"
     data-disk="{{ $file->disk }}"
     data-file-type="{{ $file->aggregate_type }}"
     data-modified="{{ $file->updated_at }}"
     data-size="{{ formatBytes($file->size)}}"
     @if($file->aggregate_type == "audio")
     data-status="playable"
     @elseif($file->aggregate_type == "video")
     data-status="playable"
     @endif
     data-href="{{ $file->getUrl() }}">
    <div class="pull-left text-muted">
        @if($file->aggregate_type == "image")
            <img src="{{$file->getUrl()}}" class="item-icons" alt="{{$file->filename}}">
        @else
            <i class="{{ $icon }}"></i>
        @endif
    </div>
    <div class="media-body">
        <div>
            <div class="pull-right inline items-list">
                <a class="btn info-btn btn-default btn-xs" data-name="{{ $file->filename }}"
                   data-id="{{ $file->id }}" data-url="{{$file->getUrl()}}" data-toggle="modal" type="rename"
                   role="button"
                   href="#info-modal">
                    <i class="fa fa-play" aria-hidden="true"></i>
                    info
                </a>
                <a class="btn download-btn btn-info btn-xs" type="download" role="button"
                   href="{{route("admin::media::download", [$disk, $file->id, $folder->id])}}"><i
                            class="fa fa-cloud-download"
                            aria-hidden="true"></i> Download</a>
                <a class="btn btn-default rename-btn btn-xs" data-rename-file="{{ $file->filename }}"
                   data-rename-path="{{ $file->id }}" data-toggle="modal" type="rename" role="button"
                   href="#renameFile-modal">
                    <i class="fa fa-edit" aria-hidden="true"></i>
                    edit
                </a>
                <a class="delete-btn text-danger btn btn-default btn-xs" type="delete" role="button"
                   href="{{route("admin::media::get.delete", [$file->id])}}">
                    <i class="fa fa-times" aria-hidden="true"></i>
                    delete
                </a>
            </div>
            <strong>{{ $file->filename }}</strong>
        </div>
        <div class="text-muted">
            <small>size: {{ formatBytes($file->size)}}</small>
            <small>last_modified: {{ $file->updated_at }}</small>
        </div>
    </div>
</div>
