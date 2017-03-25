
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo Breadcrumbs::render('reviews', 'Product reviews'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.partial._contentheader_title', [$model = new \App\Core\Models\ProductReview(), $message = "All Reviews"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('contentheader_description'); ?>
    <?php echo $__env->make('admin.partial._content-head_btns', [$routeName = "admin::products::index", $createBtn = 'Get Product For Review'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List of reviews</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="reviews-table" class="table table-bordered">
                <thead>
                <tr>
                <thead>
                <th>Id</th>
                <th>Review Product</th>
                <th>Rating</th>
                <th>isViewed</th>
                <th>Hidden</th>
                <th>Author</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th class="text-center"><em class="fa fa-cog"></em> Actions</th>
                </tr>
                </thead>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.row -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts-add'); ?>
    <script>
        $(function () {
            $('#reviews-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: "<?php echo e(route('admin::reviews::data')); ?>",
                stateSave: true,
                columns: [
                    {data: 'id'},
                    {data: 'product', name: 'product.title'},
                    {data: 'rating'},
                    {data: 'isViewed', orderable: false, searchable: false},
                    {data: 'hidden'},
                    {data: 'author'},
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