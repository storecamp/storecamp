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
                    <a class="delete-file text-danger btn btn-default btn-xs" type="delete"
                       role="button"
                       href="{{route("admin::media::get.folder.delete", [$disk, $directory->unique_id])}}"><i
                                class="fa fa-times" aria-hidden="true"></i></a>
                    <a class="rename-file text-danger btn btn-default btn-xs" data-toggle="modal"
                       href="#renameDir-modal" data-new_name="{{$directory->name}}"
                       data-rename-id="{{$directory->unique_id}}" type="rename" role="button"><i
                                class="fa fa-edit" aria-hidden="true"></i></a>
                    <a href="{{ route('admin::media::index', [$disk, $directory->unique_id]) }}"
                       class="btn btn-app"><i class='fa fa-file'></i>
                        <span>{{str_limit($directory['name'], 15)}}</span>
                        @if($directory->locked)
                            <span rel="tooltip" title="Folder Locked" data-toggle="tooltip" data-container="body"
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
