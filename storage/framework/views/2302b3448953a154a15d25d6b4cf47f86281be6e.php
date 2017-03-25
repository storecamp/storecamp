<!-- /.box-header -->
<div class="" style="display: block;">
    <div class="media">
        <div class="media-left">
            
            
            
            

        </div>
        <div class="media-body">
            <div class="col-md-12">
                <strong>
                    <span class="text-muted">author - </span>
                    <a href="<?php echo e(route("admin::users::show", $reviews->user->id)); ?>">
                        <?php echo e($reviews->user->name); ?>

                    </a>
                </strong>
                <h4><?php echo e($reviews->review); ?></h4>
                <div class="text-muted">
                    <small>Posted <?php echo e($reviews->created_at->diffForHumans()); ?></small>
                </div>
            </div>
            <div class="col-md-6">
                <span class="text-muted"><b>Product review point</b></span>
                <?php echo $__env->make('admin.partial._rating', [$selected = $reviews->rating, $readOnly = "true"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="box-footer box-comments" style="display: block;">
        <b class="text-muted">comments:</b>
        <?php echo $__env->make('site.partials.reviews.messages', [$messages = $reviews->comments->first()], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <div class="clearfix"></div>
    <?php echo $__env->make('site.partials.reviews.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<!-- /.box-body -->
<?php $__env->startPush("scripts-add_on"); ?>
<?php $__env->stopPush(); ?>