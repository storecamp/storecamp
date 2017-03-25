<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(strtoupper($message)); ?> -
    <span class="pull-right-container">
        <?php if($model): ?>
            <small class="label bg-blue text-sm"><?php echo e($model->count()); ?></small>
        <?php endif; ?>
    </span>
<?php $__env->stopSection(); ?>