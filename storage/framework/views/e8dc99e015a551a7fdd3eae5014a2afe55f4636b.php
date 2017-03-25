<?php $__env->startSection('main-content'); ?>
    <!-- /.col -->
    <div style="width: 100%;    font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-weight: 400;
    overflow-x: hidden;
    overflow-y: auto;text-align: left">
        <!-- /.box-header -->
        <?php echo Form::open(['id' => 'generateForm', 'route' => 'admin::mail::makeCampaign']); ?>

        <div class="box-body">
            <div style="text-align: left" class="form-group">
                <label style="text-align: left" for="to">To(select campaign)</label>
                <?php echo buildSelect(route('admin::campaign::get::json'), 'to', false, [], [], "to", "select campaign listed clients"); ?>

            </div>
            <div style="text-align: left" class="form-group">
                <label style="text-align: left" for="to">Subject</label>
                <input class="form-control" name="subject" id="subject" placeholder="Subject:">
            </div>
            <span class="mail-output"></span>
            <?php echo $__env->make('admin.fileLinker.fileLinkerModal', [$btnMsg='choose email template', $preferredTag = "gallery", $fileTypes = 'document', $multiple = false, $prefix="mail", $outputElementPath = ".mail-output", $disk = "mails"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <span class="files selected-block" style="float: right;clear: both;"></span>
            <div class="form-group">
                <?php echo $__env->make('admin.components.description-form', [$property_name='message'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="clearfix"></div>
            
            
            
            
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="pull-right">
                <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
                <button type="submit" onclick="save(event)" class="btn btn-primary"><i class="fa fa-envelope-o"></i>
                    Start Campaign
                </button>
            </div>
            <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
        </div>
    <?php echo Form::close(); ?>

        <!-- /.box-footer -->
    </div>
    <!-- /.row -->
    <?php $__env->startPush('scripts-add_on'); ?>
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
        emitter.on("file-removed", function (id) {
            $('#message').code(null);
            $('#message').summernote('code', null);
        });
        var save = function (event) {
            var markupStr = $('#message').code();
            var link = $("#generateForm").attr("action");
            var to = $(".to").val();
            var attachment = $("#attachment").val();
            var subject = $("#subject").val();
            event.preventDefault();

            var request = $.ajax({
                url: link,
                method: "POST",
                data: {mail: markupStr, to: to, attachment: attachment},
                beforeSend: function (jqXHR, s) {
                    var data = "<i class=\"fa fa-spin fa-spin-2x fa-3x fa-spinner fa-fw\" style='margin: 0 auto; padding: 0 auto; width: 25%; height: 25%'></i>" + "<strong class='text-warning'>Please wait</strong>";
                    $('#note').summernote({height: 100});
                    $('#result').html(data);
                }
            });

            request.done(function (data) {
                $('#note').summernote({height: 100});
                $('#result').html(data);
                $(this).addClass("done");
            });
            request.fail(function (jqXHR, textStatus) {
                $('#note').summernote({height: 100});
                console.log(jqXHR);
                $('#result').html("Generation failed: " + jqXHR.statusText + "<br>" + jqXHR.responseText);
                $('#result').addClass("error");
            });
        };

    </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.mail.frame.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>