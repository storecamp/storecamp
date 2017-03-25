
<?php $__env->startSection('htmlheader_title'); ?>
    Log in
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo e(url('/home')); ?>"><b><?php echo e(env("APP_NAME")); ?></b></a>
        </div><!-- /.login-logo -->
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="<?php echo e(url('/login')); ?>" method="post">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> remember
                            </label>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div><!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign
                    in using
                    Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign
                    in using
                    Google+</a>
            </div>
            <a href="<?php echo e(url('/password/reset')); ?>">I forgot my password</a><br>
            <a href="<?php echo e(url('/register')); ?>" class="text-center">Register a new membership</a>

        </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->
    <script src="<?php echo e(asset('custom_vendors/jQuery/jQuery-2.1.4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('custom_vendors/jQueryUI/jquery-ui-1.10.3.min.js')); ?>" type="text/javascript"></script>

    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo e(asset('plugins/bootstrap/dist/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>