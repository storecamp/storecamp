@extends('admin/app')
@section('breadcrumb')
    {!! Breadcrumbs::render('reviews', 'Product reviews') !!}
@endsection
@section('contentheader_description')
    @include('admin.partial._content-head_btns', [$routeName = "admin::products::index", $createBtn = 'Get Product For Review'])
@endsection

@section('main-content')
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

@endsection

@section('scripts-add')
    <script>
        $(function () {
            $('#reviews-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: "{{route('admin::reviews::data')}}",
                columns: [
                    {data: 'id'},
                    {data: 'product', orderable: false, searchable: false},
                    {data: 'rating'},
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
@endsection