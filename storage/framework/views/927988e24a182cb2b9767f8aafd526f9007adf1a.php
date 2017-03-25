<div class="media file-item" data-file-id="<?php echo e($file->id); ?>"
     data-filename="<?php echo e($file->filename .'.'.$file->extension); ?>"
     data-disk="<?php echo e($file->disk); ?>"
     data-file-type="<?php echo e($file->aggregate_type); ?>"
     data-modified="<?php echo e($file->updated_at); ?>"
     data-size="<?php echo e(formatBytes($file->size)); ?>"
     <?php if($file->aggregate_type == "audio"): ?>
     data-status="playable"
     <?php elseif($file->aggregate_type == "video"): ?>
     data-status="playable"
     <?php endif; ?>
     data-href="<?php echo e($file->getUrl()); ?>">
    <div class="pull-left text-muted">
        <?php if($file->aggregate_type == "image"): ?>
            <img src="<?php echo e($file->getUrl()); ?>" class="item-icons" alt="<?php echo e($file->filename); ?>">
        <?php else: ?>
            <i class="<?php echo e($icon); ?>"></i>
        <?php endif; ?>
    </div>
    <div class="media-body">
        <div>
            <div class="pull-right inline items-list">
                <a class="btn info-btn btn-default btn-xs" data-name="<?php echo e($file->filename); ?>"
                   data-id="<?php echo e($file->id); ?>" data-url="<?php echo e($file->getUrl()); ?>" data-toggle="modal"
                   data-mime="<?php echo e($file->mime_type); ?>"
                   type="info"
                   role="button"
                   href="#info-modal">
                    <i class="fa fa-play" aria-hidden="true"></i>
                    info
                </a>
                <a class="btn download-btn btn-info btn-xs" type="download" role="button"
                   href="<?php echo e(route("admin::media::download", [$disk, $file->id, $folder->id])); ?>"><i
                            class="fa fa-cloud-download"
                            aria-hidden="true"></i> Download</a>
                <a class="btn btn-default rename-btn btn-xs" data-rename-file="<?php echo e($file->filename); ?>"
                   data-rename-path="<?php echo e($file->id); ?>" data-toggle="modal" type="rename" role="button"
                   href="#renameFile-modal">
                    <i class="fa fa-edit" aria-hidden="true"></i>
                    edit
                </a>
                <a class="delete-file-btn text-danger btn btn-default btn-xs" type="delete" role="button"
                   href="<?php echo e(route("admin::media::get.delete", [$file->id])); ?>"
                   data-id="<?php echo e($file->id); ?>"
                   data-with-modal="true"
                   data-name="<?php echo e($file->filename); ?>">
                    <i class="fa fa-times" aria-hidden="true"></i>
                    delete
                </a>
            </div>
            <strong><?php echo e($file->filename  .'.'.$file->extension); ?></strong>
        </div>
        <div class="text-muted">
            <small>size: <?php echo e(formatBytes($file->size)); ?></small>
            <small>last_modified: <?php echo e($file->updated_at); ?></small>
        </div>
    </div>
</div>
