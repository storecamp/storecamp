<div id="folder-body" data-folder-url="{{route('admin::media::get.index', [$disk, $media["folderInstance"]->unique_id])}}" class="box-body folder-body">
    @include("admin.media.files-list", [$media = $media["media"], $path = $media["path"], $tag = $media["tag"], $folderInstance = $media["folderInstance"]])
    <span id="folders-side">
    @include('admin.media.folders-list')
    </span>
</div>