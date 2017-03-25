<div class="col-xs-7 col-sm-7 col-md-8 col-lg-9 files">
    <?php $tag = isset($tag) ? $tag : null; ?>
                <div class="panel">
                    <div class="panel-body">
                        <?php $__currentLoopData = $media->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($file->aggregate_type == "video"): ?>
                                <?php echo $__env->make('admin.media.file-list_item', [$icon = 'item-icons fa fa-video-camera fa-2x', $file], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php elseif($file->aggregate_type == "image"): ?>
                                <?php echo $__env->make('admin.media.file-list_item', [$icon = 'item-icons fa fa-image fa-2x', $file], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php elseif($file->aggregate_type == 'audio'): ?>
                                <?php echo $__env->make('admin.media.file-list_item', [$icon = 'item-icons fa fa-file-audio-o fa-2x', $file], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php elseif($file->aggregate_type == 'archive'): ?>
                                <?php echo $__env->make('admin.media.file-list_item', [$icon = 'item-icons fa fa-archive fa-2x', $file], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php elseif($file->aggregate_type == 'document'): ?>
                                <?php echo $__env->make('admin.media.file-list_item', [$icon = 'item-icons fa fa-file-word-o fa-2x', $file], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php elseif($file->aggregate_type == 'pdf'): ?>
                                <?php echo $__env->make('admin.media.file-list_item', [$icon = 'item-icons fa fa-file-pdf-o fa-2x', $file], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div><!-- /.panel-body -->
                </div>
        <?php if($media->count() == 0): ?>
            <h3 class="text-warning">No Files found</h3>
        <?php endif; ?>
</div>