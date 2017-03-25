
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo Breadcrumbs::render('admin'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("main-content"); ?>

<?php echo $__env->make("admin.partial._dash", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection("scripts-add"); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin/app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>