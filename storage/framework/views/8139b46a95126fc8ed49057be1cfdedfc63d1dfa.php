<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<?php echo $__env->make('partials.htmlheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<?php echo $__env->yieldContent("styles-add"); ?>
<body class="fixed sidebar-mini skin-blue-light">
<div class="wrapper">





<!-- Content Wrapper. Contains page content -->


<!-- Main content -->
    <section class="content">
        <?php if(Session::has('flash_notification.message')): ?>
            <div class="alert alert-<?php echo e(Session::get('flash_notification.level')); ?>">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                <?php echo e(Session::get('flash_notification.message')); ?>

            </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->




<?php echo $__env->make('partials.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent("scripts-add"); ?>
<?php echo Toastr::render(); ?>

</body>
</html>