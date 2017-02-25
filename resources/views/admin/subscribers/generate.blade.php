@extends('admin/app')
<h1>
    @section('breadcrumb')
        {!! Breadcrumbs::render('products', 'Products') !!}
    @endsection
    @section('contentheader_title')
        "All Campaigns - ({{ count($lists) }})
    @endsection
    @section('contentheader_description')
        <b>{{ link_to_route('admin::products::create', 'Add new product') }}</b>
    @endsection
</h1>
@section('main-content')
    @include('admin.subscribers.subscriber_buttons', $lists)
    <div class="content-body">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="panel fade in panel-default panel-fill" data-fill-color="true" data-init-panel="true">
                <div class="panel-heading p-2x" role="button" data-toggle="collapse" data-parent="#campaign"
                     data-target="#campaign1" aria-expanded="true" aria-controls="collapseOne">
                    <h3 class="panel-title">Generate Email Campaigns <strong>click</strong></h3>
                </div>
                <div id="campaign1" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">
                        @foreach($lists as $list)
                            <a href="{{ route('admin::subscribers::showGenerate', [$list->unique_id]) }}"
                               type="button"
                               class="btn btn-default btn-nofill mb-1x mr-1x"
                               style="word-break: break-all">
                                Compaign for
                                <strong>{{ $list->campaign }}</strong></a>
                            <div class="clearfix"></div>
                        @endforeach
                    </div><!-- /.panel-body -->
                </div><!-- /#getStarted1 -->
            </div>
            <div class="panel fade in panel-default panel-fill" data-fill-color="true" data-init-panel="true">
                <div class="panel-heading p-2x" role="button" data-toggle="collapse" data-parent="#template"
                     data-target="#template1" aria-expanded="true" aria-controls="collapseOne">
                    <h3 class="panel-title">Email Templates <strong>click</strong></h3>
                </div>
                <div id="template1" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">
                        @foreach($mails as $mail)
                            <a href="{{ route('admin::subscribers::tmp_mail', [$mail['filename']]) }}"
                               type="button"
                               class="btn btn-default btn-nofill mb-1x mr-1x tmp_mail"
                               style="word-break: break-all">
                                mail template
                                <strong>{{ $mail['filename'] }}</strong></a>
                            <div class="clearfix"></div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="panel fade in panel-default panel-fill" data-fill-color="true" data-init-panel="true">
                <div class="panel-heading p-2x" role="button" data-toggle="collapse" data-parent="#history_template"
                     data-target="#history_template1" aria-expanded="true" aria-controls="collapseOne">
                    <h3 class="panel-title">Campaign History <strong>click</strong></h3>
                </div>
                <div id="history_template1" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">
                        @forelse($mailHistory as $key => $mail)
                            <a href="{{ route('admin::subscribers::history_mail', [$folder = $list->unique_id, $mail['filename']]) }}"
                               type="button"
                               class="btn btn-default btn-nofill mb-1x mr-1x history_mail"
                               style="word-break: break-all" data-scripts="_includes/modal-remote.js"
                               data-toggle="modal"
                               data-target="#history-{{$list->unique_id}}-{{ $key  }}">
                                mail template
                                <strong>{{ $mail['filename'] }}</strong></a>
                            <div class="clearfix"></div>
                            <div class="modal bg-light" data-transition="shrinkIn"
                                 id="history-{{$list->unique_id}}-{{ $key  }}" tabindex="-1" role="dialog"
                                 aria-labelledby="#history-{{$list->unique_id}}-{{ $key  }}Label" aria-hidden="true">
                                <div class="modal-dialog modal-full">
                                    <div class="modal-content" style="min-height: 100%"></div>
                                </div>
                            </div><!-- /.modal -->
                        @empty
                            <a href="#"
                               type="button"
                               class="btn btn-warning btn-icon history_mail"
                               style="word-break: break-all">
                                mail template
                                <strong>no campaign emails found</strong></a>
                            <div class="clearfix"></div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <h3><strong>{{ $newslist->campaign }}</strong> - email campaign generation</h3>
            {{ Form::open(["route" => ["admin::subscribers::generate", $newslist->unique_id, $newslist->campaign], "method" => "POST", "class" => "form", "id" => "generateForm", "files" => true]) }}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group has-feedback">
                    <div id="summernote-panel" class="panel" data-fill-color="true">
                        <div class="panel-body">
                            @if(old('mail'))
                                <textarea id="note" class="reset-this"
                                          style="font-family:'Open Sans';">{{ old('mail') }}</textarea>
                            @else
                                <textarea id="note" class="reset-this" style="font-family:'Open Sans';"></textarea>
                            @endif
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->
                    <div class="panel" id="result" style="padding: 10px"></div>
                    <div class="input-group input-group-in hidden">
                        <span class="input-group-addon"><i class="icon-tag"></i></span>
                        {{ Form::textarea('mail', null, ['class' => 'form-control autogrow', 'id' => 'mail', 'value' => old('mail'), 'rows'=>'4   ', 'placeholder' => 'Email for campaign'])}}
                        <span class="form-control-feedback"></span>
                    </div>
                    <div class="text-center">
                        {{ $errors->first('mail', '<div class="text-danger">:message</div>') }}
                    </div>
                </div>
                <div class="form-group">
                    <button onclick="save(event)" type="submit" class="btn btn-default click2save">Create Email and
                        start {{ $newslist->campaign }} campaign
                    </button>
                </div>
            </div>
            {{ Form::close() }}
            <div class="clearfix"></div>
        </div>
    </div><!-- /.content-body -->
    <div class="clearfix"></div>

@endsection
@section('scripts-add')
    <script>
        var note = $('#note').summernote({
            height: 400,
            fontNames: ['Open Sans', 'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Immpact', 'Tahoma', 'Times New Roman', 'Verdana'],
            fontNamesIgnoreCheck: ['Open Sans'],
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']], // Still buggy
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview']],
                ['help', ['help']]
            ]
        });
        var save = function (event) {
            var markupStr = $('#note').code();
            var mailArea = $('#mail');
            mailArea.val(markupStr);
            mailArea.html(markupStr);
            var link = $("#generateForm").attr("action");
            event.preventDefault();

            var request = $.ajax({
                url: link,
                method: "POST",
                data: {mail: mailArea.val()},
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

        var tmp_mail = $(".tmp_mail");

        tmp_mail.on({
            "click": function (event) {
                event.preventDefault();
                var link = $(this).attr("href");
                console.log($(this).attr("href"));
                $.ajax({
                    url: link
                }).done(function (data) {
                    $('#note').code(data);
                    $('#note').summernote('code', data);
                    $(this).addClass("done");
                });
            }
        });
    </script>

@endsection
