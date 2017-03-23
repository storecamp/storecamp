@extends('admin/app')
@section('breadcrumb')
    {!! \Breadcrumbs::render('settings', 'Settings') !!}
@endsection
@include('admin.partial._contentheader_title', [$model = new \App\Core\Models\Currency(), $message = "All Currencies Count"])
@section('contentheader_description')
    @include('admin.partial._content-head_btns', [$routeName = "admin::settings::currency::create", $createBtn = 'Add New Currency'])
@endsection
@section('main-content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List of Currencies</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="currencies-table" class="table table-bordered">
                <thead>
                <tr>
                <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Code</th>
                <th>Sign</th>
                <th>Main currency</th>
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
                        <i class="settings-trash"></i> Are you sure you want to delete the <span
                                id="delete_setting_title"></span> Currency?
                    </h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin::settings::currency::delete', ['id' => '__id']) }}" id="delete_form"
                          method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="Yes, Delete This Setting">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts-add')
    <script>
        $(function () {
            $('#currencies-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: "{{route('admin::settings::currency::data')}}",
                stateSave: true,
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'code'},
                    {data: 'sign'},
                    {data: 'main'},
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
                        var display = $(this).data('name');

                        $('#delete_setting_title').text(display);
                        $('#delete_form')[0].action = $('#delete_form')[0].action.replace('__id', $(this).data('id'));

                        $('#delete_modal').modal('show');
                    });
                }
            });
        });
    </script>
    <script>
        $('document').ready(function () {
            $('.currency-trash').click(function () {
                var display = $(this).data('name');

                $('#delete_setting_title').text(display);
                $('#delete_form')[0].action = $('#delete_form')[0].action.replace('__id', $(this).data('id'));
                $('#delete_modal').modal('show');
            });
        });
    </script>
@endsection
