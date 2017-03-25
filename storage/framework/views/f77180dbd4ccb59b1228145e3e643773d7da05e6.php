
<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e($product->title); ?>

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
        <div class="product">
            <div class="col-md-6">
                <div class="modal-show">
                    <?php if($product->getMedia('gallery')->count()): ?>
                        <div class="product-images-list">
                            <div class="product-popup-gallery">
                                <?php $__currentLoopData = $product->getMedia('gallery'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e($image->getUrl()); ?>" title="<?php echo e($product->title); ?>">
                                        <img class="" src="<?php echo e($image->getUrl()); ?>" width="75" height="75">
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="product-main-img">
                            <?php $mainImage = $product->getMedia('gallery')->first(); ?>
                            <img src="<?php echo e($mainImage ? $mainImage->getUrl() : asset("/img/Image-not-found.gif")); ?>"/>
                        </div>
                    <?php else: ?>
                        <div class="product-images-list"></div>
                        <img src="<?php echo e(asset("/img/Image-not-found.gif")); ?>"/>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6">
                <?php echo Form::open(['class' => 'form-group', 'method' => 'PUT', 'files' => false, 'route' => ['site::cart::add', $product->unique_id]]); ?>

                <div class="product-title">
                    <?php echo e($product->title); ?>

                </div>
                <div class="col-md-2">
                    <div class="product-quantity">
                        <div class="label label-default">Quantity</div>
                        <input class="form-control" type="number" value="1" name="quantity">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="label label-default">Status</div>
                    <div class="product-status"><?php echo e($product->getStockStatus()); ?></div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <div class="product-review-counter">
                        <?php $ratingCounter = $product->getRatingCounter() ?>
                        <?php if(!empty($ratingCounter)): ?>
                            <span class="text-muted pull-left"><b>Product review point</b></span>
                            <?php echo $__env->make('admin.partial._rating', [$selected = $product->getAvgRating(), $readOnly = true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <span class="review-no"><?php echo e($product->getRatingCounter()); ?> reviews</span>
                        <?php else: ?>
                            <div type="text" class="product-quantity">
                                <span class="text-warning pull-left">no rating provided</span>
                                <?php echo $__env->make('admin.partial._rating', [$readOnly = true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <span class="review-no">0 reviews</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-price-box">
                        <span class="text-muted">price</span> <span class="product-price"> <?php echo e($product->price); ?>$</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-sku"><?php echo e($product->sku); ?></div>
                </div>
                <button class="btn btn-default product-add-to-cart"><em class="fa fa-cart-plus"></em> Add to cart</button>
                <?php echo Form::close(); ?>

                <hr>
                <div class="col-md-12">
                    <?php echo $__env->make("site.partials.like-btn", [$model = $product, $route = route('site::like_dis', array('class_name' => getBaseClassName($product, false), 'object_id' => $product->id))], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <button class="btn btn-default product-add-to-wishList">Add to Wish List</button>
                    <button class="btn btn-default product-add-to-compare">Add to Compare</button>
                </div>
                <div class="col-md-12">
                <div class="product-social-sharing">
                    <ul class="product-social-list">
                        <li>
                            <span>Share</span>
                        </li>
                        <li>
                            <a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a class="btn btn-social-icon btn-vk"><i class="fa fa-vk"></i></a>
                        </li>
                        <li>
                            <a class="btn btn-social-icon btn-google"><i class="fa fa-google-plus"></i></a>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="nav-tabs-custom product-tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#description" data-toggle="tab">Description</a></li>
                        <li class=""><a href="#reviews" data-toggle="tab">Reviews</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="description">
                            <p class="product-description"><?php echo $product->body; ?></p>
                        </div>
                        <div class="tab-pane" id="reviews">
                            <div class="product-reviews">
                                <?php $__currentLoopData = $product->productReview; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('site.partials.reviews.message', ['reviews' => $review], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Nav tabs -->
            </div>
            <?php echo $__env->make('site.partials.slider', [$mostViewed], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>