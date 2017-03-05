@extends('admin/app')
    @section('breadcrumb')
        {!! Breadcrumbs::render('users', 'Attributes') !!}
    @endsection
    @include('admin.partial._contentheader_title', [$model = new \App\Core\Models\AttributeGroupDescription(), $message = "Amount of Attributes"])
    @section('contentheader_description')
          @include('admin.partial._content-head_btns', [$routeName = "admin::attributes::create", $createBtn = 'Add New Attribute'])
    @endsection
@section('main-content')
      <div class="box">
        <div class="box-header">
            <h3 class="box-title">List of Attributes</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="attribute-description-table" class="table table-bordered">
                <thead>
                <tr>
                <thead>
                <th>Id</th>
                <th>Attribute Name</th>
                <th>Attribute Group</th>
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
            $('#attribute-description-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: "{{route('admin::attributes::data')}}",
                stateSave: true,
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'attributesGroup'},
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

