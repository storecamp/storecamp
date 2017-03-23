@extends('admin/app')
    @section('breadcrumb')
        {!! Breadcrumbs::render('users', 'Users') !!}
    @endsection
    @include('admin.partial._contentheader_title', [$model = new \App\Core\Models\User(), $message = "Amount of Users"])
    @section('contentheader_description')
            @include('admin.partial._content-head_btns', [$routeName = "admin::users::create", $createBtn = 'Add New User'])
    @endsection
@section('main-content')
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
@endsection
@section('scripts-add')
    <script>
        $(function () {
            $('#users-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: "{{route('admin::users::data')}}",
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
@endsection
