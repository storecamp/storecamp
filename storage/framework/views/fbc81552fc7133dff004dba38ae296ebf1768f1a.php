<?php echo e(Form::open(['files' => true, 'route' => ['admin::media::upload', $disk],
'id' => 'my-awesome-dropzone', 'class' => 'dropzone'])); ?>

<input type="hidden" name="folder" value="<?php echo e($folder->unique_id); ?>">
<?php echo e(Form::close()); ?>