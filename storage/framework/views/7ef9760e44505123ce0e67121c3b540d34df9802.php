<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-language"></i> <?php echo e($navigation['locale']); ?> <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <?php $__currentLoopData = config('laravellocalization.supportedLocales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($navigation['locale'] == $key): ?>
                <li class="active"><a href="<?php echo e(route('site::toggleLanguage', [$key])); ?>"><?php echo e($value['name']); ?></a></li>
            <?php else: ?>
                <li><a href="<?php echo e(route('site::toggleLanguage', [$key])); ?>"><?php echo e($value['name']); ?></a></li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</li>