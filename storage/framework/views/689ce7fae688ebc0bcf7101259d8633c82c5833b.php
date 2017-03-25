<?php echo e(Form::open(['files' => false, 'route' => ['admin::media::rename.directory', $disk]])); ?>

<div class="form-group">
    <?php echo e(Form::label('path', 'Path:')); ?>

    <div class="input-group margin">
        <div class="input-group-btn">
            <button type="button" class="btn btn-info disabled"><?php echo e($path ? $path : "../"); ?></button>
        </div>
        <!-- /btn-group -->
        <?php echo e(Form::text('new_name', null, ['class' => 'form-control new_name'])); ?>

        <?php echo $errors->first('new_name', '<div class="text-danger">:message</div>'); ?>

        <?php echo e(Form::text('folder', null, ['class' => 'form-control rename-id hidden'])); ?>

    </div>
    <?php echo e(Form::submit('confirm folder rename', ['class' => "btn btn-default"])); ?>

</div>
<?php echo e(Form::close()); ?>