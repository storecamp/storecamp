
<?php $__env->startSection('contentheader_title'); ?>
    Add New Product
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheader_description'); ?>
    <?php echo $__env->make('admin.partial._content-head_btns', [$routeName = "admin::products::index", $createBtn = 'Back', $showFilters = false], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
    <div>
        <?php echo $__env->make('admin.products.form', [$categories, $chosenCategory], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>