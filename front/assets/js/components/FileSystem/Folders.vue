<template>
<span id="folders-side">
    <div class="col-xs-5 col-sm-5 col-md-4 col-lg-3 directories">
        <div class="box box-default">
            <div class="box-header with-border">
            <h3 class="box-title">Folders</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
                <!-- /.box-tools -->
        </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">

                            <div class="col-xs-12 col-md-6 directory-item">
                    <a class="delete-file text-danger btn btn-default btn-xs" type="delete" role="button"
                       href="http://storecamp.dev/en/admin/media/delete/folder/local/d8dbcd87-d3ac-4ddd-97e2-86ecf0b0a265"><i
                            class="fa fa-times" aria-hidden="true"></i></a>
                    <a class="rename-file text-danger btn btn-default btn-xs" data-toggle="modal"
                       href="#renameDir-modal" data-new_name="mails"
                       data-rename-id="d8dbcd87-d3ac-4ddd-97e2-86ecf0b0a265" type="rename" role="button"><i
                            class="fa fa-edit" aria-hidden="true"></i></a>
                    <a href="http://storecamp.dev/en/admin/media/index/local/d8dbcd87-d3ac-4ddd-97e2-86ecf0b0a265"
                       class="btn btn-app"><i class="fa fa-file"></i>
                        <span>mails</span>
                                            </a>
                </div>
                            <div class="col-xs-12 col-md-6 directory-item">
                    <a class="delete-file text-danger btn btn-default btn-xs" type="delete" role="button"
                       href="http://storecamp.dev/en/admin/media/delete/folder/local/63b6c976-2e1e-48f5-be3e-714c8bcae16f"><i
                            class="fa fa-times" aria-hidden="true"></i></a>
                    <a class="rename-file text-danger btn btn-default btn-xs" data-toggle="modal"
                       href="#renameDir-modal" data-new_name="ivan"
                       data-rename-id="63b6c976-2e1e-48f5-be3e-714c8bcae16f" type="rename" role="button"><i
                            class="fa fa-edit" aria-hidden="true"></i></a>
                    <a href="http://storecamp.dev/en/admin/media/index/local/63b6c976-2e1e-48f5-be3e-714c8bcae16f"
                       class="btn btn-app"><i class="fa fa-file"></i>
                        <span>ivan</span>
                                            </a>
                </div>
                            <div class="col-xs-12 col-md-6 directory-item">
                    <a class="delete-file text-danger btn btn-default btn-xs" type="delete" role="button"
                       href="http://storecamp.dev/en/admin/media/delete/folder/local/1125f67f-6b07-4eda-84b3-79680a7f9875"><i
                            class="fa fa-times" aria-hidden="true"></i></a>
                    <a class="rename-file text-danger btn btn-default btn-xs" data-toggle="modal"
                       href="#renameDir-modal" data-new_name="badCoder"
                       data-rename-id="1125f67f-6b07-4eda-84b3-79680a7f9875" type="rename" role="button"><i
                            class="fa fa-edit" aria-hidden="true"></i></a>
                    <a href="http://storecamp.dev/en/admin/media/index/local/1125f67f-6b07-4eda-84b3-79680a7f9875"
                       class="btn btn-app"><i class="fa fa-file"></i>
                        <span>badCoder</span>
                                            </a>
                </div>
                                </div>
            <!-- /.box-body -->
        </div>
    </div>
</span>
</template>

<script>
export default {
    props: ['folder']
}
</script>