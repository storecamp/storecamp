
    <?php $__env->startSection('breadcrumb'); ?>
        <?php echo Breadcrumbs::render('users', 'Users'); ?>

    <?php $__env->stopSection(); ?>
    <?php echo $__env->make('admin.partial._contentheader_title', [$model = new \App\Core\Models\User(), $message = "Amount of Users"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->startSection('contentheader_description'); ?>
            <?php echo $__env->make('admin.partial._content-head_btns', [$routeName = "admin::users::create", $createBtn = 'Add New User'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List of Users</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="users-table" class="table table-bordered">
                <thead>
                <tr>
                <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th class="text-center"><em class="fa fa-cog"></em> Actions</th>
                </tr>
                </thead>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-add'); ?>
    <script>
        $(function () {
            $('#users-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: "<?php echo e(route('admin::users::data')); ?>",
                stateSave: true,
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'roles', name: 'roles.name'},
                    {
                        data: 'created_at', render: function (d) {
                        return moment(d.date).fromNow();
                    }
                    },
                    {
                        data: 'updated_at', render: function (d) {
                        return moment(d.date).fromNow();
                    }
                    },
                    {data: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>