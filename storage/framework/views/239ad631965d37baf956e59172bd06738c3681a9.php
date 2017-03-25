<div class="modal" id="renameFile-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Please Rename File</h4>
            </div>
            <div class="modal-body" style="word-wrap: break-word;">
                <?php echo e(Form::open(['files' => false, 'route' => ['admin::media::rename.file', $disk]])); ?>

                <div class="form-group">
                    <?php echo e(Form::label('new_name', 'New file name:')); ?>

                    <div class="input-group margin">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-info disabled"><?php if($folder->name): ?><?php echo e($folder->name); ?> <?php else: ?> ../ <?php endif; ?></button>
                        </div>
                        <!-- /btn-group -->
                        <?php echo e(Form::text('new_name', null, ['class' => 'form-control rename-file-field'])); ?>

                        <?php echo e($errors->first('new_name', '<div class="text-danger">:message</div>')); ?>

                        <?php echo e(Form::text('selected_id', null, ['class' => 'form-control selected_id hidden'])); ?>

                    </div>
                    <?php echo e(Form::submit('confirm file rename', ['class' => "btn btn-default"])); ?>

                </div>
                <?php echo e(Form::close()); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php $__env->startPush('scripts-add_on'); ?>
<script>
    $(function () {
        var renameFileModal = $('#renameFile-modal'),
            submitBtn = renameFileModal.find('button[type=submit]'),
            modalTitle = renameFileModal.find('.modal-title'),
            modalBody = renameFileModal.find('.modal-body');

        renameFileModal.on('shown.bs.modal', function (event) {
            var renameFileTrigger = $(event.relatedTarget); // Button that triggered the modal
            var renameFileId = renameFileTrigger.data('rename-path');
            var renameFileName = renameFileTrigger.data('rename-file');
            renameFileModal.find('.rename-file-field').val(renameFileName);
            renameFileModal.find('.selected_id').val(renameFileId);
            $(this).modal('show');
        });
    });

</script>
<?php $__env->stopPush(); ?>