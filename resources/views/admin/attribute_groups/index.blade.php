@extends('admin/app')
@section('breadcrumb')
        {!! Breadcrumbs::render('attribute groups', 'Attribute Groups') !!}
    @endsection
    @include('admin.partial._contentheader_title', [$model = $groupAttributes, $message = "Amount of Group Attributes"])
    @section('contentheader_description')
            @include('admin.partial._content-head_btns', [$routeName = "admin::attribute_groups::create", $createBtn = 'Add New Group Attribute'])
    @endsection
@section('main-content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List of Group Attributes</h3>
                    <div class="box-tools">
                        @include('admin.partial._box_search')
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <th>#</th>
                        <th>Attribute Group name</th>
                        <th>Sort Order</th>
                        <th>Created</th>
                        <th class="text-center"><em class="fa fa-cog"></em> Actions</th>
                        </thead>
                        <tbody>
                        @foreach ($groupAttributes as $groupAttribute)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $groupAttribute->name }}</td>
                                <td>{{ $groupAttribute->sort_order }}</td>
                                <td>{{ $groupAttribute->created_at }}</td>
                                <td class="text-center">
                                    <a class="btn btn-default edit"
                                       href="{{ route('admin::attribute_groups::edit', $groupAttribute->unique_id) }}"
                                       title="Edit">
                                        <em class="fa fa-pencil-square-o"></em></a>
                                    <a class="btn btn-danger delete text-warning"
                                       href="{{ route('admin::attribute_groups::get::delete', $groupAttribute->unique_id) }}"
                                       title="Are you sure you want to delete?"><em class="fa fa-trash-o"></em></a>
                                </td>
                            </tr>
                            <?php $no++;?>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
    <div class="text-center">
        {{ $groupAttributes->links() }}
    </div>
@endsection
