@extends("admin/app")
@section('breadcrumb')
    {!! Breadcrumbs::render('products', 'Products') !!}
@endsection
@include('admin.partial._contentheader_title', [$model = new \App\Core\Models\Product(), $message = "All Products"])
@section('contentheader_description')
    @include('admin.partial._content-head_btns', [$routeName = "admin::products::create", $createBtn = 'Add new product'])
@endsection
@section("main-content")
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
@endsection
@section('scripts-add')
    <script>
        $(function () {
            $('#products-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: "{{route('admin::products::data')}}",
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
@endsection

