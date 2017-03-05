@extends('admin/app')
@section('breadcrumb')
        {!! Breadcrumbs::render('attribute groups', 'Attribute Groups') !!}
    @endsection
    @include('admin.partial._contentheader_title', [$model = new \App\Core\Models\AttributeGroup(), $message = "Amount of Group Attributes"])
    @section('contentheader_description')
            @include('admin.partial._content-head_btns', [$routeName = "admin::attribute_groups::create", $createBtn = 'Add New Group Attribute'])
    @endsection
@section('main-content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List of Group Attributes</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="attributes-table" class="table table-bordered">
                <thead>
                <tr>
                <thead>
                <th>Id</th>
                <th>Attribute Group name</th>
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
            $('#attributes-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: "{{route('admin::attribute_groups::data')}}",
                stateSave: true,
                columns: [
                    {data: 'id'},
                    {data: 'name'},
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


