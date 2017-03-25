<?php $chosenCategoryId = $chosenCategory ? $chosenCategory->id : null; ?>
<style>
    .category .btn.active {
        border: 2px dashed #3c8dbc;
    }
    .category .btn.active .choose-category {
        background: lightgrey;
        color: #3c8dbc;
    }
    .choose-category {
        background: #3c8dbc;
        color: whitesmoke;
        padding: 2px;
        border: 1px solid black;
        border-radius: 2px;
    }
</style>
<div class="form-group">
    <?php echo e(Form::label('category_id', 'Products Category', ['class' => 'control-label'])); ?>

    <a data-toggle="modal" href="#category-chooser-modal"
       class="form-control choose-opener col-sm-12">
        <?php echo e(isset($chosenCategory) ? $chosenCategory->name : "choose category"); ?>

    </a>
    <div class="clearfix"></div>
    <?php echo e(Form::input('text','category_id', $chosenCategoryId, ['class' => 'chosen-category hidden'])); ?>

</div>
<div class="modal" id="category-chooser-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Choose Parent Category</h4>
            </div>
            <div class="modal-body" style="word-wrap: break-word;">
                <?php echo $__env->make('admin.products.category_chooser_product', [$categories, $chosenCategory], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="modal-footer">
                <h4 href="#" class="pull-left chosen-category text-success"><b class="text-muted">Category </b>
                    <span class="chosen-status">
                        <?php if($chosenCategory): ?>
                            <?php echo e($chosenCategory->name); ?> - <i class="fa fa-thumbs-o-up"></i>
                        <?php endif; ?>
                    </span>
                </h4>
                <a role="button" class="btn btn-warning remove-chooser">remove category</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>