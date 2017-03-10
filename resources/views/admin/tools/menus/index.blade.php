@extends('admin/app')
@section('breadcrumb')
    {!! Breadcrumbs::render('menus', 'Menus') !!}
@endsection
@include('admin.partial._contentheader_title', [$model = new \App\Core\Models\Menu(), $message = "Amount of Menus"])
@section('contentheader_description')
    @include('admin.partial._content-head_btns', [$routeName = "admin::menus::create", $createBtn = 'Add New Menu'])
    <button class="btn pull-right" style="margin-bottom: 20px;" data-toggle="collapse" href="#info" aria-expanded="false"
            aria-controls="info">
        <span class="fa fa-info"></span>info
    </button>
@endsection
@section('main-content')
    <div class="collapse" id="info">
        <div class="alert alert-info">
            <strong>How To Use:</strong>
            <p>You can get the menu by its own type on your site by calling <code>menu($menu->name, 'default')</code></p>
            <p class="text-mute"><b>types:</b>
                <span class="text-warning">'default'</span>
                <span class="divider"> || </span>
                <span class="text-warning">'navigation'</span>
            </p>
        </div>
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List of Menus</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="menus-table" class="table table-bordered">
                <thead>
                <tr>
                <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th class="text-center"><em class="fa fa-cog"></em> Actions</th>
                </tr>
                </thead>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        <i class="voyager-trash"></i> Are you sure you want to delete this <b>menu</b>?
                    </h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin::menus::index') }}" id="delete_form" method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="Yes, Delete This Menu">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts-add')
    <script>
        $(function () {
            $('#menus-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: "{{route('admin::menus::data')}}",
                stateSave: true,
                columns: [
                    {data: 'id'},
                    {data: 'name'},
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
                ],
                fnInitComplete: function () {
                    $('td').on('click', '.delete', function (e) {
                        id = $(e.target).data('id');

                        $('#delete_form')[0].action += '/' + id;

                        $('#delete_modal').modal('show');
                    });
                }
            });
        });

    </script>
@endsection

