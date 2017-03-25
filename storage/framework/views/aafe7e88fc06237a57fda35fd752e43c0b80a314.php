
<?php $i = 0; ?>
<select <?php echo $multiple ? "multiple" : null; ?> style="z-index: 25!important;width:100%; display: initial;"
        name="<?php echo $attrName; ?>"
        class="form-control <?php echo $class; ?>"
        title="<?php echo isset($title) ? $title : ""; ?>">
    <?php echo $placeholder; ?>
        <?php $__currentLoopData = $selected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $i++; ?>
            <?php if($i <= 1): ?>
                <option value="" disabled selected><?php echo isset($placeholder) ? $placeholder : "select an option"; ?></option>
                <option <?php echo array_key_exists($item, $selected) == true ? "selected" : null; ?>  value="<?php echo strtolower($item); ?>"><?php echo e(ucfirst($tag)); ?></option>
            <?php else: ?>
                <option <?php echo array_key_exists($item, $selected) == true ? "selected" : null; ?>  value="<?php echo strtolower($item); ?>"><?php echo e(ucfirst($tag)); ?></option>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if(!count($selected)): ?>
            <option value="" disabled selected><?php echo isset($placeholder) ? $placeholder : "select an option"; ?></option>
        <?php endif; ?>
</select>
<?php $__env->startPush('scripts-add_on'); ?>
<script>
    <?php if($className): ?>
    if($('.<?php echo e($className); ?>').length > 0) {
        var selector = $('.<?php echo e($className); ?>');
    } else {
        var selector = $('.select_builder_select');
    }
    <?php else: ?>
    var selector = $('.select_builder_select');
    <?php endif; ?>

    selector.select2({
        ajax: {
            url: "<?php echo $actionUrl; ?>",
            delay: 250,
            data: function (params) {
                var query = {
                    search: params.term, // search term
                    page: params.page
                };
                return query;
            },
            processResults: function (data) {
                return {
                    results: data
                };
            }
        }
    });
</script>
<?php $__env->stopPush(); ?>
