<?php if(isset($property_name)): ?>
<div class="form-group" style="text-align: left; margin-top:15px">
    <?php echo e(Form::label($property_name, ucwords($property_name).':')); ?>

    <?php echo e(Form::textarea($property_name, old(ucwords($property_name)), ['class' => 'form-control description', "id" => $property_name])); ?>

    <?php echo e($errors->first($property_name, '<div class="text-danger">:message</div>')); ?>

    </div>
<?php $__env->startPush('scripts-add_on'); ?>
    <!-- include summernote css/js-->
    <script>
        $(document).ready(function() {
            $('textarea[name=<?php echo e($property_name); ?>]').summernote({
                height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null             // set maximum height of editor
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php else: ?>
    <h1 class="text-warning">Please specify $property_name</h1>
<?php endif; ?>