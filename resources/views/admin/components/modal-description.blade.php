<div class="modal" id="{{ $attrName }}-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body" style="word-wrap: break-word;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@push("scripts-add_on")
    <script>
        $(function () {
            var descModal = $('#{{ $attrName }}-modal'),
                submitBtn = descModal.find('button[type=submit]'),
                modalTitle = descModal.find('.modal-title'),
                modalBody = descModal.find('.modal-body');

            descModal.on('shown.bs.modal', function (event) {
                var descTrigger = $(event.relatedTarget); // Button that triggered the modal
                $(this).modal('show');
                modalBody.html(null);
                modalTitle.html(null);

                $.ajax({
                    url: descTrigger.data('desc-url'),
                    type: 'GET',
                    success: function (data) {
                        modalBody.html(data);
                        modalTitle.html('{{ $attrName }} - '+descTrigger.data('desc-name'));
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