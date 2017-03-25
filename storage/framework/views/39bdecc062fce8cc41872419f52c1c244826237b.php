<div class="col-lg-4 col-md-4 col-sm-4 xs-4">
    <div class="like">
        <span class="label label-info pull-right">
            <?php echo e($model->getLikeCount()); ?>

        </span>
        <a data-base-url="<?php echo e($route); ?>"
           href="<?php echo e($route); ?>"
           data-button-ID=$('like')
           data_class_name="<?php echo e(getBaseClassName($model)); ?>"
           data_object_id="<?php echo e($model->id); ?>"
           class="like-btn btn btn-default pull-right">
            <?php if($model->liked(Auth::user())): ?>
                <span class="text-muted like-message"></span>
            <?php endif; ?>
            <?php if($model->liked(Auth::user())): ?>
                <i class="fa fa-heart text-danger "></i>
            <?php else: ?>
                <i class="fa fa-heart-o"></i>
            <?php endif; ?>
        </a>
    </div>
</div>