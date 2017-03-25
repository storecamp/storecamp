<?php if(isset($model)): ?>
    <?php $preferredTag = isset($preferredTag) ? $preferredTag : 'thumbnail'; ?>
    <?php $__currentLoopData = $model->getMedia($preferredTag); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($file->aggregate_type == "video"): ?>
            <?php echo $__env->make('admin.fileLinker.file-linker_selected_item', [$icon = 'item-icon fa fa-video-camera', $file], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php elseif($file->aggregate_type == "image"): ?>
            <?php echo $__env->make('admin.fileLinker.file-linker_selected_item', [$icon = 'item-icon fa fa-image', $file], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php elseif($file->aggregate_type == 'audio'): ?>
            <?php echo $__env->make('admin.fileLinker.file-linker_selected_item', [$icon = 'item-icon fa fa-file-audio-o', $file], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php elseif($file->aggregate_type == 'archive'): ?>
            <?php echo $__env->make('admin.fileLinker.file-linker_selected_item', [$icon = 'item-icon fa fa-archive', $file], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php elseif($file->aggregate_type == 'document'): ?>
            <?php echo $__env->make('admin.fileLinker.file-linker_selected_item', [$icon = 'item-icon fa fa-file-word-o', $file], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php elseif($file->aggregate_type == 'pdf'): ?>
            <?php echo $__env->make('admin.fileLinker.file-linker_selected_item', [$icon = 'item-icon fa fa-file-pdf-o', $file], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>