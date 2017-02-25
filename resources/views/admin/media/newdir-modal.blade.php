<div class="modal" id="newdir-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Please Create Directory</h4>
            </div>
            <div class="modal-body" style="word-wrap: break-word;">
                @include('admin.media.newdir-form')
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
        var newdirModal = $('#newdir-modal'),
            submitBtn = newdirModal.find('button[type=submit]'),
            modalTitle = newdirModal.find('.modal-title'),
            modalBody = newdirModal.find('.modal-body');

        newdirModal.on('shown.bs.modal', function (event) {
            var newdirTrigger = $(event.relatedTarget); // Button that triggered the modal
            $(this).modal('show');
        });
        var newDirForm = $("#newDirForm");
        $("#newDirForm").submit(function(event){
            event.preventDefault();
            var folderNewPath = newDirForm.find('.folder-new-path').val(),
                folderId = newDirForm.find('.folder-id').val(),
                folderSide = $('#folders-side');
            $.ajax({
                url: newDirForm.attr('action'),
                type: 'POST',
                data: {new_path: folderNewPath, folder: folderId},
                success: function (data) {
                    $.ajax({
                        url: "{{route('admin::media::get.index.folders', [$disk, $folder->id])}}",
                        type: 'GET',
                        success: function (data) {
                            folderSide.html(data);
                            newdirModal.modal('hide')
                            $.StoreCamp.media.fileSystemEvents()
                        },
                        error: function (xhr, textStatus, errorThrown) {
                            modalTitle.html("<p class='text-danger'>ERROR Appeared!</p>");
                            modalBody.html("<b class='text-warning'>" + xhr.responseJSON + "</b>" + "<br><code class='text-warning'>" + 'code - ' + xhr.status + ' statusText - ' + xhr.statusText + "</code>");
                            console.error(xhr);
                        }
                    });
                    return false;
                },
                error: function (xhr, textStatus, errorThrown) {
                    modalTitle.html("<p class='text-danger'>ERROR Appeared!</p>");
                    modalBody.html("<b class='text-warning'>"+xhr.responseJSON+"</b>"+ "<br><code class='text-warning'>" +'code - '+ xhr.status + ' statusText - '+xhr.statusText + "</code>");
                    console.error(xhr);
                }
            });
            return false;
        });
    });

</script>
@endpush