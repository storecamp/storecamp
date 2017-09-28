@extends('admin/app')
@section('breadcrumb')
    {!! Breadcrumbs::render('users', 'Attributes') !!}
@endsection
@include('admin.partial._contentheader_title', [$model = $mails, $total = $total, $message = "Amount of sent Mail Campaigns"])
@section('contentheader_description')
    @include('admin.partial._content-head_btns', [$routeName = "admin::mail::create", $createBtn = 'Compose Campaign'])
@endsection
@section('main-content')
    <style>
        .pagination {
            margin: 0;
        }
    </style>
    <!-- Main content -->
    <div class="row">
    <!-- /.col -->
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">List of emails</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="emailsGrid" class="tleft"></table>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
@endsection
@section('scripts-add')
    <script>
        $.StoreCamp.MailStory;
        $(function () {
            var gridData = [];
            var emailsGrid = null;
            var _this = this;
            var pageInit = function () {
                var columns = [
                    {
                        title: 'From', data: 'from',
                        render: function (data, type, full, meta) {
                            var html = '';
                            var iter = 1;
                            if (typeof data === 'string') {
                                var mailTo = 'mailto:' + data;
                                html += '<a class="label label-default" href="' + mailTo + '">' + data + '</a>';
                            } else {
                                $.each(data, function (index) {
                                    var item = data[index];
                                    var mailTo = 'mailto:' + item;
                                    html += '<a class="label label-default" href="' + mailTo + '">' + item + '</a>';
                                    if (iter % 3 == 0) {
                                        html += "</br>";
                                    }
                                    iter++;
                                });
                            }
                            return html;
                        }
                    },
                    {
                        title: 'Reply To', data: 'reply_to', type: 'string',
                        render: function (data, type, full, meta) {
                            var html = '';
                            var iter = 1;
                            if (typeof data === 'string') {
                                var mailTo = 'mailto:' + data;
                                html += '<a class="label label-default" href="' + mailTo + '">' + data + '</a>';
                            } else {
                                $.each(data, function (index) {
                                    var item = data[index];
                                    var mailTo = 'mailto:' + item;
                                    html += '<a class="label label-default" href="' + mailTo + '">' + item + '</a>';
                                    if (iter % 3 == 0) {
                                        html += "</br>";
                                    }
                                    iter++;
                                });
                            }
                            return html;
                        }
                    },
                    {
                        title: 'Cc', data: 'cc', orderable: false, searchable: false,
                        render: function (data, type, full, meta) {
                            var html = '';
                            var iter = 1;
                            if (typeof data === 'string') {
                                var mailTo = 'mailto:' + data;
                                html += '<a class="label label-default" href="' + mailTo + '">' + data + '</a>';
                            } else {
                                $.each(data, function (index) {
                                    var item = data[index];
                                    var mailTo = 'mailto:' + item;
                                    html += '<a class="label label-default" href="' + mailTo + '">' + item + '</a>';
                                    if (iter % 3 == 0) {
                                        html += "</br>";
                                    }
                                    iter++;
                                });
                            }
                            return html;
                        }
                    },
                    {
                        title: 'Bcc', data: 'bcc', orderable: false, searchable: false,
                        render: function (data, type, full, meta) {
                            var html = '';
                            var iter = 1;
                            $.each(data, function (index) {
                                var item = data[index];
                                var mailTo = 'mailto:' + item;
                                html += '<a class="label label-default" href="' + mailTo + '">' + item + '</a>';
                                if (iter % 3 == 0) {
                                    html += "</br>";
                                }
                                iter++;
                            });
                            return html;
                        }
                    },
                    {
                        title: 'Subject', data: 'subject', width: '15%',
                    },
                    {
                        title: 'Status', data: 'status', searchable: false,
                        render: function (data, type, full, meta) {
                            var isDrafted = full.is_drafted;
                            var drafted = '';
                            if (isDrafted) {
                                drafted = "<br><div class='text-warning'>drafted</div>";
                            }
                            return data + drafted;
                        }
                    },
                    {
                        title: 'Created', data: 'created_at', width: '15%'
                    },
                    {
                        title: 'Is Delayed', data: 'delay_time', width: 'auto',
                        render: function (data, type, full, meta) {
                            if (data) {
                                return "<div class='label label-info' style='width: 100%; display: block;position: relative;text-align: center;'>" + data + "</div>";
                            } else {
                                return "<div class='label label-default' style='width: 100%; display: block;position: relative;text-align: center;'>" +
                                    "No" +
                                    "</div>";
                            }
                        }
                    },
                    {
                        title: 'Actions',
                        data: null,
                        width: 'auto',
                        render: function (data, type, full, meta) {
                            var buttons = '<div class="btn-group">' +
                                '<a class="btn btn-xs btn-default edit-mail" href="'+ data.url +'" data-row="' + meta.row + '" onclick="">View</a>';
                            buttons +=
                                '<button class="btn btn-xs btn-default show-recepients" ' +
                                'data-row="' + meta.row + '" onclick="">Statuses</button>' + '</div>';
                            return buttons;
                        },
                        orderable: false,
                        searchable: false,
                    },
                ];
                emailsGrid = $("#emailsGrid").DataTable({
                    columns: columns,
                    serverSide: true,
                    processing: true,
                    ajax: APP_URL + '/admin/mail/history',
                    "order": [[6, 'desc']],
                    dom: '<"row" <"#filterWrapper.col-md-8" > <"#actionWrap.col-md-4 text-right" f> ><"row" <"col-md-12"<"td-content"rt>>><"row" <"col-md-6"i><"col-md-6"p>>', //
                    initComplete: function () {
                        console.log('Hello there Init Complete');
                        var filterByRangeHtml = $(
                            '<div class="form-inline">' +
                            '<div class="form-group" style="margin-right: 10px;margin-bottom: 10px">' +
                            '<label class="control-label" >Status:' +
                            '<select class="form-control input-sm"  style="margin-left:5px" id="module" ><option>All</option><option>Pending</option><option>Failed</option><option>Sent</option></select>' +
                            '</label></div>' +
                            '<div class="form-group" style="margin-right: 10px;margin-bottom: 10px">' +
                            '<label  class="control-label"  >Start:' +
                            '<input class="form-control input-sm"  style="margin-left:5px" id="startRange" type="text" placeholder="">' +
                            '</label></div>'+
                            '<div class="form-group" style="margin-right: 10px;margin-bottom: 10px">'+
                            '<label style="margin-left:10px" class="control-label">End:' +
                            '<input class="form-control input-sm" style="margin-left:5px"  id="endRange" type="text" placeholder="">' +
                            '</label></div>' +
                            '</div>' +
                            '</div>'
                        );

                        $('#filterWrapper').append(filterByRangeHtml);
                    }
                });
                gridData = emailsGrid.rows()
                    .data();
            };

            /**
             * validate input
             * @param  subject
             * @param  body
             * @param  cc
             * @param  bcc
             * @param  replyTo
             * @returns  {boolean}
             */
            var validateInputs = function (subject, body, cc, bcc, replyTo) {
                $('#mailErrorMess').hide();

                if (subject == '' || body == '') {
                    $('#mailErrorMess').html('Fill Subject and Body fields, please!').show();
                    return false;
                }
                if ($.StoreCamp.MailStory.additionalMails(cc) &&
                    $.StoreCamp.MailStory.additionalMails(bcc)
                    && $.StoreCamp.MailStory.additionalMails(replyTo)) {
                    $('#mailErrorMess').html('Emails(cc,bcc,reply to) not filled properly!').show();
                    return false;
                }
                return true;
            };

            var additionalMails = function (addmails) {
                if (!addmails) {
                    return '';
                }
                addmails = addmails.replace(/[ ]/, '');
                var amails = addmails.split(/[,;]/);
                var valid = true, additional_mails = [];
                $.each(amails, function (k, v) {
                    if (v != '') {
                        additional_mails.push(v);
                        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                        if (!re.test(v)) {
                            valid = false;
                        }
                    }
                });
                if (valid) {
                    return additional_mails;
                } else {
                    return false;
                }
            };

            $.StoreCamp.MailStory = {
                additionalMails: additionalMails,
                validateInputs: validateInputs,
                activate: pageInit
            };
            $.StoreCamp.MailStory.activate();
        });
    </script>
@endsection