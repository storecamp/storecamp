@if($folder)
    <div class="col-md-7 pull-left">
        <small>
        Folder
        </small>
        <b style="font-size: 20px; text-decoration: underline;" class="text-info">
            {!! $urlFolderPathBuild !!}
        </b>
    </div>
    <div class="col-md-5 pull-right  text-right">
        <small>Disks</small>
        <b style="font-size: 20px; text-decoration: underline;" class="text-info">
            {!! $rootFolders !!}
        </b>
    </div>
@endif
