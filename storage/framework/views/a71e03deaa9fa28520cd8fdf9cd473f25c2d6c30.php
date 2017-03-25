
<?php
if (!isset($class)) {
    $class = '';
}
if (!isset($childClass)) {
    $childClass = '';
}
if (!isset($childUlClass)) {
    $childUlClass = '';
}
?>
<ul class="<?php echo $structureClasses["root_class"]; ?> <?php echo e($class); ?>">
    <?php if($menu->getLabel()): ?>
    <li class="header">
        <?php echo $menu->getLabel(); ?>

    </li>
    <?php endif; ?>
    <?php $__currentLoopData = $menu->getItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($item['item'] instanceof \storecamp\htmlelements\Menu): ?>
                <li class="<?php echo $structureClasses["li_class"]; ?> <?php echo e($childClass); ?> <?php echo e(app('elements.menu.manager')->isActive($item) ? 'active' : ''); ?>">
                    <a class="<?php echo e($structureClasses["a_class"]); ?>" href="<?php echo $item['item']->getItems()[0]['item']['url']; ?>">
                        <?php echo $item['before']; ?>

                        <?php echo $item['item']->getLabel(); ?>

                        <?php echo $item['after']; ?>

                    </a>
                    <ul class="<?php echo e($structureClasses["ul_class"]); ?> <?php echo e($childUlClass); ?>">
                        <?php $__currentLoopData = $item['item']->getItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($item['item'] instanceof \storecamp\htmlelements\Menu): ?>
                                <li class="<?php echo $structureClasses["li_class"]; ?> <?php echo e($childClass); ?> <?php echo e(app('elements.menu.manager')->isActive($item) ? 'active' : ''); ?>">
                                    <a class="<?php echo e($structureClasses["a_class"]); ?>" href="<?php echo $item['item']->getItems()[0]['item']['url']; ?>">
                                        <?php echo $item['before']; ?>

                                        <?php echo $item['item']->getLabel(); ?>

                                        <?php echo $item['after']; ?>

                                    </a>
                                    <?php echo $__env->make(\storecamp\htmlelements\MenuManager::PLUGIN_NAME.'::menu.sub_menu', ['menu' => $item['item']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </li>
                            <?php else: ?>
                                <li class="<?php echo e($structureClasses["li_class"]); ?> item <?php echo e(app('elements.menu.manager')->isActive($item) ? 'active' : ''); ?>">
                                    <a class="<?php echo e($structureClasses["a_class"]); ?>" href="<?php echo e($item['item']['url']); ?>">
                                        <?php echo $item['before']; ?>

                                        <?php echo $item['item']['text']; ?>

                                        <?php echo $item['after']; ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
            <?php else: ?>
                <li class="<?php echo e($structureClasses["li_class"]); ?> item <?php echo e(app('elements.menu.manager')->isActive($item) ? 'active' : ''); ?>">
                    <a class="<?php echo e($structureClasses["a_class"]); ?>" href="<?php echo e($item['item']['url']); ?>">
                        <?php echo $item['before']; ?>

                        <?php echo $item['item']['text']; ?>

                        <?php echo $item['after']; ?>

                    </a>
                </li>
            <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>