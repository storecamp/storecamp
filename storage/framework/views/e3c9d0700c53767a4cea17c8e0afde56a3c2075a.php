<div class="modal modal-danger fade" tabindex="-1" id="delete_file_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="settings-trash"></i> Are you sure you want to delete the <span
                            id="delete_setting_title"></span> File?
                </h4>
            </div>
            <div class="modal-footer">
                <form style="display: inline-block;" action="<?php echo e(route('admin::media::delete', ['id' => '__id'])); ?>" id="delete_file_form"
                      method="POST">
                    <?php echo e(method_field("DELETE")); ?>

                    <?php echo e(csrf_field()); ?>

                    <button class="btn btn-danger pull-right delete-confirm">Yes, Delete <b>__name</b> File</button>
                </form>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>