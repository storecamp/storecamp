<?php echo e(Form::open(['files' => false, 'id' => 'newDirForm','route' => ['admin::media::make.directory', $disk]])); ?>

<div class="form-group">
    <?php echo e(Form::label('path', 'Path:')); ?>


    <div class="input-group margin">
        <div class="input-group-btn">
            <button type="button" class="btn btn-info disabled"><?php echo e($folder->name ? $folder->name : '../'); ?></button>
        </div>
        <!-- /btn-group -->
        <?php echo e(Form::text('new_path', null, ['class' => 'form-control folder-new-path'])); ?>

        <?php echo $errors->first('new_path', '<div class="text-danger">:message</div>'); ?>

        <?php echo e(Form::text('folder', $folder->unique_id, ['class' => 'form-control folder-id hidden'])); ?>    </div>
    <?php echo e(Form::submit('confirm folder creation', ['class' => "btn btn-default"])); ?>

</div>
<?php echo e(Form::close()); ?>