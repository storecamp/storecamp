<div class="tab-pane active" id="general">
<?php if(isset($review)): ?>
    <?php echo e(Form::model($review, ['route' => ['admin::reviews::update',
    $review->id], 'method' => 'PUT', "role" => "form",'files' => false ])); ?>

<?php else: ?>
    <?php echo e(Form::open(['route' => ['admin::reviews::store', $product->id], 'method' => 'POST', "role" => "form", ])); ?>

<?php endif; ?>
<!-- Message Form Input -->
    <div class="form-group">
        <div class="box-header with-border">
            <h3 class="box-title">
                Product Review for -
                <strong>
                    <span class="text-muted">product - </span>
                    <a href="<?php echo e(route("admin::products::show", $product->id)); ?>">
                        <?php echo e($product->title); ?>

                    </a>
                </strong>
            </h3>
            <div class="box-tools pull-right">
                <label for="hidden" class="pull-left text-info" style="padding: 7px;">visibility filter</label>
                <div class="form-group pull-right" style="width: auto">
                    <?php echo e(Form::select('hidden', ["0"=> 'visible', "1"=> 'hidden'], [old('hidden')],
                    ["class" => "form-control pull-right", "id" => "hidden"])); ?>

                </div>
                <?php echo $errors->first('hidden', '<div class="text-danger">:message</div>'); ?>

            </div>
            <!-- /.box-tools -->
        </div>
    </div>
    <div class="form-group">
        <?php echo e(Form::textarea('review', old('review'), [
        'class' => 'form-control autogrow', "rows" => "6","placeholder"=>"Reply form here.."])); ?>

        <?php echo $errors->first('review', '<div class="text-danger">:message</div>'); ?>

    </div>
    <h3 class="text-muted"><b>Product review point</b></h3>
    <div class="col-md-6">
        <?php echo $__env->make('admin.partial._rating', [$selected = old('rating') ?
        old('rating') : isset($review) ? $review->rating : null], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $errors->first('rating', '<div class="text-danger">:message</div>'); ?>

    </div>
    <div class="form-group text-right">
        <button class="btn btn-primary">Confirm</button>
    </div>
    <?php echo e(Form::close()); ?>

</div>