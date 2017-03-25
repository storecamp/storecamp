<?php $prefix = isset($prefix) ? $prefix : null;
?>
<span class="linker-output" style="
    float: left;
    clear: both;
">
    <?php isset($preferredTag) ? $preferredTag : 'thumbnail' ?>
    <a data-toggle="modal" href="#fileLinker-modal"
       class="btn btn-md btn-info file-linker"
       data-file-types="<?php echo e($fileTypes ? $fileTypes : "images"); ?>"
       data-multiple="<?php echo e($multiple ? 'true' : 'false'); ?>"
       data-disk="<?php echo e($disk ? $disk : 'local'); ?>"
       data-attach-output-path="<?php echo e($outputElementPath); ?>"
       data-preferred-tag="<?php echo e($preferredTag); ?>"
       data-requestUrl="<?php echo e(route('admin::media::file_linker', [$disk])); ?>"
       style="text-align: left;float:left; clear: both; font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-weight: 400;">
        <?php echo e($btnMsg ? $btnMsg : "attach file"); ?>

    </a>
    <div class="clearfix"></div>
</span>
<div class="clearfix"></div>
<div class="modal tallModal modal-wide" id="fileLinker-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title" style="text-align: left; clear: both; float:left; font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-weight: 400;">Please Select Files To Attach</h4>
            </div>
            <div class="modal-body" style="word-wrap: break-word;"></div>
            <div class="modal-footer">
                <div class="col-md-10 selected-block">
                    <?php if(isset($model)): ?>
                        <?php $__currentLoopData = $model->getMedia($preferredTag); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make("admin.fileLinker.file-linker_selected_item", [$file = $item], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>