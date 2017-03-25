<?php if(Session::has('flash_notification.message')): ?>
    <?php if(Session::has('flash_notification.overlay')): ?>
        <?php echo $__env->make('flash::modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php else: ?>
        <div class="alert alert-<?php echo e(Session::get('flash_notification.level')); ?>">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            <p class='text-center'><?php echo Session::get('flash_notification.message'); ?></p>
        </div>
    <?php endif; ?>
<?php endif; ?>
