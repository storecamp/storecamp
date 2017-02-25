<div class="row">
    <!-- /.col -->
    <div class="col-md-12">
        <!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                <label for="to">To(select campaign)</label>
                {!! buildSelect(route('admin::campaign::get::json'), 'to', false, [], [], null, "select campaign listed clients") !!}
            </div>
            <div class="form-group">
                <label for="to">Subject</label>
                <input class="form-control" placeholder="Subject:">
            </div>
            <div class="mail-output"></div>

            @include('admin.fileLinker.fileLinkerModal', [$btnMsg='choose email template', $preferredTag = "gallery", $fileTypes = 'document', $multiple = false, $outputElementPath = ".mail-output", $disk = "mails"])
            <div class="form-group">
                @include('admin.components.description-form', [$property_name='message'])
            </div>
            <div class="files selected-block"></div>
            <div class="clearfix"></div>
            <div class="form-group">
                <div class="btn btn-default btn-file">
                    <i class="fa fa-paperclip"></i> Attachment
                    <input type="file" name="attachment">
                </div>
                <p class="help-block">Max. 32MB</p>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="pull-right">
                <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
            </div>
            <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
        </div>
        <!-- /.box-footer -->
    </div>
</div>
<!-- /.row -->
@push('scripts-add_on')
<script>
    emitter = $.StoreCamp.fileLinker.emitter;
    emitter.on('selectedChanged', function () {
        var items = $(".selected-item");
        if (items.attr('data-href')) {
            $.ajax({
                url: items.attr('data-href')
            }).done(function (data) {
                $('#message').code(data);
                $('#message').summernote('code', data);
                $(this).addClass("done");
            });
        } else {
            $('#message').code(null);
            $('#message').summernote('code', null);
        }
    });
</script>
@endpush