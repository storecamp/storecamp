@extends("admin/app")

    @section('breadcrumb')
        {!! Breadcrumbs::render('categories', 'Categories') !!}
    @endsection
    @include('admin.partial._contentheader_title', [$model = new \App\Core\Models\Category(), $message = "All Categories"])
    @section('contentheader_description')
            @include('admin.partial._content-head_btns', [$routeName = "admin::categories::create", $createBtn = 'Add New Category'])
    @endsection
    @section("main-content")
    @include('admin.components.modal-description', [$attrName = "Description"])
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List of categories</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="categories-table" class="table table-bordered">
                <thead>
                <tr>
                <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Display Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Sort Order</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th class="text-center"><em class="fa fa-cog"></em> Actions</th>
                </tr>
                </thead>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

@endsection
@section('scripts-add')
    <script>
        $(function () {
            $('#categories-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: "{{route('admin::categories::data')}}",
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'slug'},
                    {data: 'description', orderable: false, searchable: false},
                    {data: 'status'},
                    {data: 'sort_order'},
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
@endsection
