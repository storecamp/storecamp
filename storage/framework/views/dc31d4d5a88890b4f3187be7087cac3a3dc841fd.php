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
<?php echo $__env->yieldContent('styles-add'); ?>
<body class="fixed sidebar-mini skin-blue">
<div id="app" class="wrapper">
    <?php echo $__env->make('partials.mainheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php echo $__env->make('partials.contentheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="clearfix"></div>
        <!-- Main content -->
        <section class="content">
            <div id="alerts" style="display: block; height: auto; width: 100%; background: whitesmoke">
                <?php echo $__env->make('components.flash.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <!-- Your Page Content Here -->
            <?php echo $__env->yieldContent('main-content'); ?>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php echo $__env->make('partials.controlsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div><!-- ./wrapper -->
<?php echo $__env->make('partials.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('scripts-add'); ?>
<?php echo $__env->yieldPushContent('scripts-add_on'); ?>
<?php echo Toastr::render(); ?>

</body>
</html>