@extends('admin/app')
<h1>
    @section('breadcrumb')
        {!! Breadcrumbs::render('users', 'Attributes') !!}
    @endsection
    @include('admin.partial._contentheader_title', [$model = $mails, $message = "Amount of sent eMails"])
    @section('contentheader_description')
        <b>{{ link_to_route('admin::attributes::create', 'Add New Attribute') }}</b>
    @endsection
</h1>
@section('main-content')
    <!-- Main content -->
    <div class="row">
    @include('admin.mail.mail_sidebar')
    <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Mail Templates</h3>
                    <div class="box-tools pull-right">
                        <div class="has-feedback">
                            <input type="text" class="form-control input-sm" placeholder="Search Mail">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                        <div class="pull-right">
                            1-50/200
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                            </div>
                            <!-- /.btn-group -->
                        </div>
                        <!-- /.pull-right -->
                    </div>
                    <div class="table-responsive mailbox-messages">
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
                        <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-padding">
                    <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                        <div class="pull-right">
                            1-50/200
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                            </div>
                            <!-- /.btn-group -->
                        </div>
                        <!-- /.pull-right -->
                    </div>
                </div>
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
