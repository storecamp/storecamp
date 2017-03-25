<div class="col-xs-7 col-sm-7 col-md-8 col-lg-9 files">
    <span class="navigation-links">
        <?php echo $__env->make('admin.fileLinker.navigation_path', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </span>
    <div class="clearfix"></div>
    <?php $tag = isset($tag) ? $tag : null; ?>
    <?php $__currentLoopData = array_chunk($media->all(), 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row file-list">
            <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($file->aggregate_type == "video"): ?>
                    <?php echo $__env->make('admin.fileLinker.fileLinker-item', [$icon = 'item-icon fa fa-video-camera', $file], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php elseif($file->aggregate_type == "image"): ?>
                    <?php echo $__env->make('admin.fileLinker.fileLinker-item', [$icon = 'item-icon fa fa-image', $file], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php elseif($file->aggregate_type == 'audio'): ?>
                    <?php echo $__env->make('admin.fileLinker.fileLinker-item', [$icon = 'item-icon fa fa-file-audio-o', $file], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php elseif($file->aggregate_type == 'archive'): ?>
                    <?php echo $__env->make('admin.fileLinker.fileLinker-item', [$icon = 'item-icon fa fa-archive', $file], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php elseif($file->aggregate_type == 'document'): ?>
                    <?php echo $__env->make('admin.fileLinker.fileLinker-item', [$icon = 'item-icon fa fa-file-word-o', $file], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php elseif($file->aggregate_type == 'pdf'): ?>
                   <?php echo $__env->make('admin.fileLinker.fileLinker-item', [$icon = 'item-icon fa fa-file-pdf-o', $file], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php if($media->count() == 0): ?>
            <h3 class="text-warning">No Files found</h3>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
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

            <?php $__currentLoopData = $directories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $directory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xs-12 col-md-6 directory-item">
                    <a class="btn btn-app select-folder"
                       type="select"
                       role="checkbox"
                       data-folder-url="<?php echo e(route('admin::media::file_linker', [$disk, $directory->unique_id])); ?>"
                       data-folder-id="<?php echo e($directory->unique_id); ?>">
                        <i class='fa fa-file'></i>
                        <span><?php echo e(str_limit($directory['name'], 15)); ?></span>
                        <?php if($directory->locked): ?>
                            <span rel="tooltip" title="Folder Locked" data-toggle="tooltip"
                                  data-container="body"
                                  class="locked-file text-info btn-xs" role="button">
                                <span class="fa fa-key" aria-hidden="true"></span>
                            </span>
                        <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($directories->count() == 0): ?>
                <h3 class="text-warning">No folders found</h3>
            <?php endif; ?>
        </div>
        <!-- /.box-body -->
    </div>
</div>
<div class="clearfix"></div>
<script>
    $('input[type="checkbox"].selectedFile, input[type="radio"].selectedFile').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
</script>