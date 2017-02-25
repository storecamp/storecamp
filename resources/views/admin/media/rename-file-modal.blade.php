<div class="modal" id="renameFile-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Please Rename Directory</h4>
            </div>
            <div class="modal-body" style="word-wrap: break-word;">
                {{ Form::open(['files' => false, 'route' => ['admin::media::rename.file', $disk]]) }}
                <div class="form-group">
                    {{ Form::label('new_name', 'New file name:') }}
                    <div class="input-group margin">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-info disabled">@if($folder->name){{ $folder->name }} @else ../ @endif</button>
                        </div>
                        <!-- /btn-group -->
                        {{ Form::text('new_name', null, ['class' => 'form-control rename-file-field']) }}
                        {{ $errors->first('new_name', '<div class="text-danger">:message</div>') }}
                        {{ Form::text('selected_id', null, ['class' => 'form-control selected_id hidden']) }}
                    </div>
                    {{ Form::submit('confirm file rename', ['class' => "btn btn-default"]) }}
                </div>
                {{ Form::close() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@push('scripts-add_on')
<script>
    $(function () {
        var renameFileModal = $('#renameFile-modal'),
            submitBtn = renameFileModal.find('button[type=submit]'),
            modalTitle = renameFileModal.find('.modal-title'),
            modalBody = renameFileModal.find('.modal-body');

        renameFileModal.on('shown.bs.modal', function (event) {
            var renameFileTrigger = $(event.relatedTarget); // Button that triggered the modal
            var renameFileId = renameFileTrigger.data('rename-path');
            var renameFileName = renameFileTrigger.data('rename-file');
            renameFileModal.find('.rename-file-field').val(renameFileName);
            renameFileModal.find('.selected_id').val(renameFileId);
            $(this).modal('show');
        });
    });

</script>
@endpush