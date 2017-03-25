
    <?php $__env->startSection('breadcrumb'); ?>
        <?php echo Breadcrumbs::render('reviews', 'reviews'); ?>

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('contentheader_title'); ?>
        Create Product Review
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('contentheader_description'); ?>
        <?php echo $__env->make('admin.partial._content-head_btns', [$routeName = "admin::reviews::index", $createBtn = 'Back', $showFilters = false], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#general" data-toggle="tab">General</a></li>
        </ul>
        <div class="tab-content">
            <?php echo $__env->make('admin.reviews.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>