@extends('admin/app')
    @section('breadcrumb')
        {!! \Breadcrumbs::render('roles', 'Roles') !!}
    @endsection
    @include('admin.partial._contentheader_title', [$model = $roles, $message = "All Roles Count"])
    @section('contentheader_description')
            @include('admin.partial._content-head_btns', [$routeName = "admin::roles::create", $createBtn = 'Add New Role'])
    @endsection
@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List of Roles</h3>
                    <div class="box-tools">
                        @include('admin.partial._box_search')
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Alias</th>
                        <th>Description</th>
                        <th>Privilege</th>
                        <th>Created</th>
                        <th class="text-center"><em class="fa fa-cog"></em> Actions</th>
                        </thead>
                        <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->display_name }}</td>
                                <td>{{ $role->description }}</td>
                                <td>
                                    @foreach($role->perms as $permission)
                                    &bullet; {{ $permission->name }}<br>
                                    @endforeach
                                </td>
                                <td>{{ $role->created_at }}</td>
                                <td class="text-center">
                                    <a class="btn btn-default edit" href="{{ route('admin::roles::edit', $role->unique_id) }}" title="Edit">
                                        <em class="fa fa-pencil-square-o"></em></a>
                                    <a class="btn btn-danger delete text-warning" href="{{ route('admin::roles::get::delete', $role->unique_id) }}"
                                       title="Are you sure you want to delete?"><em class="fa fa-trash-o"></em></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
    <div class="text-center">
        {{ $roles->links() }}
    </div>
@endsection