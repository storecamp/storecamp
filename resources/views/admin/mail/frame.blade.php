@extends('admin.mail.frame.layout')
@section('main-content')
    <!-- /.col -->
    <div style="width: 100%;    font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-weight: 400;
    overflow-x: hidden;
    overflow-y: auto;text-align: left">
        <!-- /.box-header -->
        {!! Form::open(['id' => 'generateForm', 'route' => 'admin::mail::saveAsNewAndResend']) !!}
        <div class="box-body">
            <div style="text-align: left" class="form-group">
                <label style="text-align: left" class="control-label" for="subject">Subject</label>
                <input class="form-control" name="subject" id="subject" placeholder="Subject:">
            </div>
            <div class="form-group">
                <label for="from" class="control-label">From</label>
                <input type="text" name="from" id="from" value="" placeholder="From" class="form-control">
            </div>
            <div style="text-align: left" class="form-group">
                <label style="text-align: left" for="to">To</label>
                <input type="text" name="to" id="to" value="" placeholder="To" class="to form-control">
            </div>
            <div style="text-align: left" class="form-group">
                <label style="text-align: left" for="to">Bcc</label>
                {!! buildSelect(route('admin::search::searchUser'), 'bcc', true, [], [], "bcc", null, true) !!}
            </div>
            <div style="text-align: left" class="form-group">
                <label style="text-align: left" for="to">CC</label>
                {!! buildSelect(route('admin::search::searchUser'), 'cc', true, [], [], "cc", null, true) !!}
            </div>
            <div style="text-align: left" class="form-group">
                <label style="text-align: left" for="to">Reply To</label>
                {!! buildSelect(route('admin::search::searchUser'), 'reply_to', true, [], [], "reply_to", null, true) !!}
            </div>
            <span class="mail-output"></span>
            @include('admin.fileLinker.fileLinkerModal', [$btnMsg='choose email template', $preferredTag = "gallery", $fileTypes = 'document', $multiple = false, $prefix="mail", $outputElementPath = ".mail-output", $disk = "local"])
            <span class="files selected-block" style="float: right;clear: both;"></span>
            <div class="form-group">
                @include('admin.components.description-form', [$property_name='message'])
            </div>
            <div class="clearfix"></div>
            {{--<div class="form-group">--}}
            {{--@include('admin.fileLinker.fileLinkerModal', [$btnMsg='attach file', $preferredTag = "gallery", $prefix="attachment", $fileTypes = 'document, image, video, pdf, archive, audio', $multiple = false, $outputElementPath = ".attach-output", $disk = "local"])--}}
            {{--<div class="attach-output"></div>--}}
            {{--</div>--}}
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="pull-right">
                <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
                <button type="submit" onclick="save(event)" class="btn btn-primary"><i class="fa fa-envelope-o"></i>
                    Start Campaign
                </button>
            </div>
            <button type="reset" class="btn btn-default pull-left"><i class="fa fa-times"></i> Discard</button>
        </div>
    {!! Form::close() !!}
        <!-- /.box-footer -->
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
            var cc = $("#cc").val();
            var bcc = $("#bcc").val();
            var reply_to = $("#reply_to").val();
            var from = $("#from").val();
            event.preventDefault();

            var request = $.ajax({
                url: link,
                method: "POST",
                data: {body: markupStr, subject: subject,cc: cc, bcc: bcc, reply_to: reply_to, from: from, to: to, attachment: attachment},
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
    @endpush
@endsection
