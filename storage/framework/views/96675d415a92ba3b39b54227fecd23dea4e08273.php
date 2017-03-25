<div id="folder-body" data-folder-url="<?php echo e(route('admin::media::get.index', [$disk, $media["folderInstance"]->unique_id])); ?>" class="box-body folder-body">
    <?php echo $__env->make("admin.media.files-list", [$media = $media["media"], $path = $media["path"], $tag = $media["tag"], $folderInstance = $media["folderInstance"]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <span id="folders-side">
    <?php echo $__env->make('admin.media.folders-list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </span>
</div>