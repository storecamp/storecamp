<a href="#" class="btn btn-default sidebar-nav-trigger" data-toggle="offcanvas" role="button">
    Toggle navigation
</a>
<nav class="site_sidebar active" data-active-parents="true">
    <ul>
        <li class="sidebar-label">Navigation</li>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!$category->parent_id): ?>
                <?php $children = $category->children; ?>
                <li class="<?php echo e($children  ? 'has-children' : ''); ?>">
                    <a href="<?php echo e(route('site::products::index', [$category->unique_id])); ?>">
                        <i class="fa fa-link"></i>
                        <span class="count"><?php echo e(count($children)); ?></span>
                        <?php echo e($category->name); ?>

                    </a>
                    <?php if($children): ?>
                        <ul class="item" style="">
                            <?php $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(route('site::products::index', [$child->unique_id])); ?>">
                                        <i class="fa fa-link"></i>
                                        <span><?php echo e($child->name); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <ul>
        <li class="sidebar-label">Action</li>
        <li class="action-btn"><a href="#0">+ Button</a></li>
    </ul>
</nav>