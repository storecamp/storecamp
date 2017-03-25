<div class="btn-group" style="">
        <?php $class = isset($classBtn) ? 'btn btn-info '.$classBtn : 'btn btn-info'; ?>
    <?php echo e(link_to_route($routeName, $createBtn, [], ['class' => $class ])); ?>

    <?php $showFilters = isset($showFilters) ? $showFilters : true; ?>
    <?php if($showFilters): ?>
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
            <i class="fa fa-filter fa-fw"></i> Options <span class="fa fa-angle-down"></span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
            <?php $filters = isset($filters) ? $filters : []; ?>
            <?php $__empty_1 = true; $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li><a href="#"><span class="fa fa-circle-o fa-fw text-danger"></span> Important</a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>
        </ul>
    <?php endif; ?>
        <?php echo $__env->yieldContent('head_btn-group'); ?>
</div>