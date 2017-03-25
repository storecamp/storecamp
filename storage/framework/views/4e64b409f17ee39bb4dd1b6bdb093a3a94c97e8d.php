<!--Item slider text-->
<div class="container">
    <div class="row slider-text">
        <div class="col-md-6">
            <h2>Top Products in Category</h2>
        </div>
    </div>
</div>
<!-- Item slider-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="owl-carousel owl-theme">
                <?php $countViewed = count($mostViewed); ?>
                <?php $__empty_1 = true; $__currentLoopData = $mostViewed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="">
                        <a target="_blank" href="<?php echo e(route('site::products::show', $product->unique_id)); ?>">
                            <?php $mainImage = $product->getMedia('gallery')->first(); ?>
                            <img src="<?php echo e($mainImage ? $mainImage->getUrl() : asset("/img/Image-not-found.gif")); ?>"
                                 class="img-responsive center-block"/>
                        </a>
                        <h4 class="text-center">
                            <a target="_blank" href="<?php echo e(route('site::products::show', $product->unique_id)); ?>">
                                <?php echo e($product->title); ?>

                            </a>
                        </h4>
                        <h5 class="text-center"><?php echo e(shopFormat($product->price)); ?></h5>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div>
                        <h3 class="text-muted">No More Products In This Category</h3>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>
<!-- Item slider end-->
<?php $__env->startPush('scripts-add_on'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/owl.carousel/dist/assets/owl.carousel.min.css')); ?>"/>
<script src="<?php echo e(asset('plugins/owl.carousel/dist/owl.carousel.min.js')); ?>"></script>
<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 4,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true
    });
    $('.play').on('click', function () {
        owl.trigger('play.owl.autoplay', [1000])
    })
    $('.stop').on('click', function () {
        owl.trigger('stop.owl.autoplay')
    })
</script>
<?php $__env->stopPush(); ?>