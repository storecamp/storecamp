@extends('admin/app')
@section('breadcrumb')
    {!! \Breadcrumbs::render('roles', 'Roles') !!}
@endsection
@include('admin.partial._contentheader_title', [$model = new \App\Core\Models\Role(), $message = "All Roles Count"])
@section('contentheader_description')
    @include('admin.partial._content-head_btns', [$routeName = "admin::roles::create", $createBtn = 'Add New Role'])
@endsection
@section('main-content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List of Roles</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="roles-table" class="table table-bordered">
                <thead>
                <tr>
                <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Display Name</th>
                <th>Description</th>
                <th>Permissions</th>
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
            $('#roles-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: "{{route('admin::roles::data')}}",
                stateSave: true,
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'display_name'},
                    {data: 'description'},
                    {data: 'permissions'},
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