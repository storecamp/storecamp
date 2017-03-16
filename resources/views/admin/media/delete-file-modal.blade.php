<div class="modal modal-danger fade" tabindex="-1" id="delete_file_modal" role="dialog">
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
                <form style="display: inline-block;" action="{{ route('admin::media::delete', ['id' => '__id']) }}" id="delete_file_form"
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
@push('scripts-add_on')
<script>
    $('document').ready(function () {
        $('.delete-file-btn').click(function (e) {
            e.preventDefault();
            var display = $(this).data('name');
            $('#delete_filename').text(display);
            $('#delete_file_form')[0].action = $('#delete_file_form')[0].action.replace('__id', $(this).data('id'));
            $('#delete_file_modal').modal('show');
        });
    });
</script>
@endpush