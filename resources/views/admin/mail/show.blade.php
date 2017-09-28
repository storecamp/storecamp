@extends('admin/app')
@section('breadcrumb')
    {!! Breadcrumbs::render('users', 'Attributes') !!}
@endsection
@include('admin.partial._contentheader_title', [$model = $mail, $total = $total, $message = "Amount of sent eMails"])
@section('contentheader_description')
    @include('admin.partial._content-head_btns', [$routeName = "admin::mail::create", $createBtn = 'Compose Email'])
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
                <div class="box-header with-border">
                    <h3 class="box-title">Read Mail</h3>

                    <div class="box-tools pull-right">
                        @if($previous)
                            <a href="{{route('admin::mail::show', $previous)}}" class="btn btn-box-tool"
                               data-toggle="tooltip" title="Previous"><i
                                        class="fa fa-chevron-left"></i></a>
                        @endif
                        @if($next)
                            <a href="{{route('admin::mail::show', $next)}}" class="btn btn-box-tool"
                               data-toggle="tooltip" title="Next"><i
                                        class="fa fa-chevron-right"></i></a>
                        @endif
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="mailbox-read-info">
                        <h3>{{ucfirst($mail->subject)}}</h3>
                        <h5>From: {{$mail->from}}
                            <span class="mailbox-read-time pull-right">{{$mail->created}}</span></h5>
                    </div>
                    <!-- /.mailbox-read-info -->
                    <div class="mailbox-controls with-border text-center">
                        <div class="btn-group">
                            {!! Form::open(['method' => 'delete', 'class' => 'remove-form-style', 'route' => ['admin::mail::delete', $mail->id]]) !!}
                            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip"
                                    data-container="body" title="Delete">
                                <i class="fa fa-trash-o"></i></button>
                            {!! Form::close() !!}
                            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip"
                                    data-container="body" title="Reply">
                                <i class="fa fa-reply"></i></button>
                            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip"
                                    data-container="body" title="Forward">
                                <i class="fa fa-share"></i></button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                            <i class="fa fa-print"></i></button>
                    </div>
                    <!-- /.mailbox-controls -->
                    <div class="mailbox-read-message">
                        <p>{{$mail->html}}</p>
                    </div>
                    <!-- /.mailbox-read-message -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <ul class="mailbox-attachments clearfix">
                        <li>
                            <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                            <div class="mailbox-attachment-info">
                                <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                                    Sep2014-report.pdf</a>
                                <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                            </div>
                        </li>
                        <li>
                            <span class="mailbox-attachment-icon"><i class="fa fa-file-word-o"></i></span>

                            <div class="mailbox-attachment-info">
                                <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> App
                                    Description.docx</a>
                                <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                            </div>
                        </li>
                        <li>
                                <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo1.png"
                                                                                   alt="Attachment"></span>

                            <div class="mailbox-attachment-info">
                                <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo1.png</a>
                                <span class="mailbox-attachment-size">
                          2.67 MB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                            </div>
                        </li>
                        <li>
                                <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo2.png"
                                                                                   alt="Attachment"></span>

                            <div class="mailbox-attachment-info">
                                <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo2.png</a>
                                <span class="mailbox-attachment-size">
                          1.9 MB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /.box-footer -->
                <div class="box-footer">
                    <div class="pull-right">
                        <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
                        <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
                    </div>
                    <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
                    <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- /.content -->
@endsection
