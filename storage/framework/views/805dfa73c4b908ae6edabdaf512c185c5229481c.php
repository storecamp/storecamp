<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<?php echo $__env->make('site.partials.htmlheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
<body class="hold-transition layout-top-nav">
<div class="wrapper">
    <?php echo $__env->make('site.partials.mainheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="container-fluid">
        <!-- Content Wrapper. Contains page content -->
        <?php echo $__env->make('site.partials.contentheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="clearfix"></div>
        <!-- Main content -->
        <section class="content">
            <div id="alerts" style="display: block; height: auto; width: 100%; background: whitesmoke">
                <?php echo $__env->make('components.flash.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
                <?php echo $__env->make('site.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <!-- Your Page Content Here -->
            <div class="col-md-10 col-md-9 col-sm-8">
                <?php echo $__env->yieldContent('breadcrumbs'); ?>
                <?php echo $__env->yieldContent('main-content'); ?>
            </div>
        </section><!-- /.content -->
    </div>
</div>
<?php echo $__env->make('partials.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent("scripts-add"); ?>
<?php echo $__env->yieldPushContent('scripts-add_on'); ?>
<?php echo Toastr::render(); ?>

</body>
</html>