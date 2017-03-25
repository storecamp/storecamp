<?php $__env->startSection('breadcrumb'); ?>
    
    <?php echo Breadcrumbs::render('attributes', 'Attributes'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheader_title'); ?>
    Create Attribute
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('contentheader_description'); ?>
    &middot;
    <b><?php echo e(link_to_route('admin::attributes::index', 'Back')); ?></b>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
    <div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#general" data-toggle="tab">General</a></li>
            </ul>
            <div class="tab-content">

                <iframe src="<?php echo route('admin::mail::showFrame'); ?>" id="mail-iframe" height="100%" width="100%"
                        scrolling="yes"
                        frameborder="0"></iframe>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-add'); ?>
    <script>
        parent.document.getElementById('mail-iframe').style.height = document['body'].offsetHeight+100 + 'px';
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>