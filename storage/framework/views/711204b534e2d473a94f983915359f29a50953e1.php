<div class="category nav nav-pills nav-stacked">
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!$category->parent_id): ?>
            <?php $children = $category->children; ?>
            <li class="treeview category-treeview">
            <a class="btn btn-app <?php echo e($chosenCategoryId ? $chosenCategoryId == $category->id ? "active": "" : ""); ?>"
               role="button"
            >
                <i class="fa fa-link"></i>
                <span class="badge bg-green"><?php echo e(count($children)); ?></span>
                <span class="">
                        <?php echo e($category->name); ?>

                    </span>
                <b  data-choose-name="<?php echo e($category->name); ?>"
                    data-choose-path="<?php echo getCategoryFullPath($category); ?>"
                    data-choose-id="<?php echo e($category->id); ?>" class="text-muted pull-right choose-category">choose category</b>
            </a>
            <?php if($children): ?>
                <ul class="treeview-menu nav nav-pills nav-stacked" style="display:none">
                    <?php $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a class="btn btn-app <?php echo e($chosenCategoryId == $child->id ? "active": ""); ?>">
                                <i class="fa fa-link"></i>
                                <span><?php echo e($child->name); ?></span>
                                <b data-choose-path="<?php echo getCategoryFullPath($child); ?>"
                                   data-choose-name="<?php echo e($child->name); ?>"
                                   data-choose-id="<?php echo e($child->id); ?>"
                                   class="text-muted pull-right choose-category">
                                    choose category
                                </b>
                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </li>
            <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
