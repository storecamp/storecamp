
<?php $__env->startSection('htmlheader_title'); ?>
    Products
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumbs'); ?>
    <?php if($category): ?>
        <?php echo Breadcrumbs::render('Products', $category); ?>

    <?php else: ?>
        <?php echo Breadcrumbs::render('Products', 'products'); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheader_title'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-4">
                <div class="product-item">
                    <div class="item-img-wrapper">
                        <?php if($product->getMedia('gallery')->count()): ?>
                            <?php $mainImage = $product->getMedia('gallery')->first(); ?>
                            <img <?php echo e($product->title); ?> class="img-responsive"
                                 src="<?php echo e($mainImage ? $mainImage->getUrl() : asset("/img/Image-not-found.gif")); ?>"/>
                        <?php else: ?>
                            <img alt="<?php echo $product->title; ?>" class="img-responsive"
                                 src="<?php echo e(asset("/img/Image-not-found.gif")); ?>"/>
                        <?php endif; ?>
                        <div>
                            <a href="#" class="btn">Preview</a>
                            <a href="<?php echo route('site::products::show', [$product->unique_id]); ?>" class="btn">Full
                                View</a>
                        </div>
                    </div>
                    <h3>
                        <a href="<?php echo route('site::products::show', [$product->unique_id]); ?>"><?php echo $product->title; ?></a>
                    </h3>
                    <div class="item-price">$<?php echo $product->price; ?></div>
                    <span class="product-description">
                          <?php echo $product->description; ?>

                        </span>
                    <?php echo Form::open(['class' => 'form-group', 'method' => 'PUT', 'files' => false, 'route' => ['site::cart::add', $product->unique_id]]); ?>

                    <input type="submit" class="btn add2cart" value="Add to cart">
                    <?php echo Form::close(); ?>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <h2 class="text-muted text-center">Sorry</h2>
            <h3 class="text-warning text-center">No Products Found</h3>
        <?php endif; ?>
        <div class="clearfix"></div>
        <div class="text-center">
            <?php echo e($products->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>