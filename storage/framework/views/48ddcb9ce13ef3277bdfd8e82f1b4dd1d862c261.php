
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo Breadcrumbs::render('products', 'Products'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.partial._contentheader_title', [$model = new \App\Core\Models\Product(), $message = "All Products"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('contentheader_description'); ?>
    <?php echo $__env->make('admin.partial._content-head_btns', [$routeName = "admin::products::create", $createBtn = 'Add new product'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("main-content"); ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List of products</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="products-table" class="table table-bordered">
                <thead>
                <tr>
                <thead>
                <th>Id</th>
                <th>Product Title</th>
                <th>Model</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Availability</th>
                <th>Stock Status</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Review</th>
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
            $('#products-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: "<?php echo e(route('admin::products::data')); ?>",
                stateSave: true,
                columns: [
                    {data: 'id'},
                    {data: 'title'},
                    {data: 'model'},
                    {data: 'category', name: 'categories.name'},
                    {data: 'price'},
                    {data: 'quantity'},
                    {data: 'availability'},
                    {data: 'stock_status', orderable: true, searchable: false},
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
                    {data: 'review', orderable: false, searchable: false},
                    {data: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("admin/app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>