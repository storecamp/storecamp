@extends('admin/app')
<h1>
    @section('breadcrumb')
        {!! Breadcrumbs::render('products', 'Products') !!}
    @endsection
    @include('admin.partial._contentheader_title', [$model = $products, $message = "All Products"])
    @section('contentheader_description')
        <b>{{ link_to_route('admin::products::create', 'Add new product') }}</b>
    @endsection
</h1>
@section('main-content')
    @include('admin.subscribers.subscriber_buttons', $lists)
    <div class="content-body">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="panel">
                <div class="panel-body">
                    @foreach($lists as $list)
                        <a href="{{ route('web::admin::newsletter::subscribe::showGenerate', [$list->unique_id]) }}"
                           type="button"
                           class="btn btn-default btn-nofill mb-1x mr-1x"
                           style="word-break: break-all">
                            Compaign for
                            <strong>{{ $list->listName }}</strong></a>
                    @endforeach
                </div>
            </div>
            <div class="panel">
                <div class="panel-body">
                    @foreach($mails as $mail)
                        <a href="{{ route('web::admin::newsletter::subscribe::showGenerate', [$mail->filename]) }}"
                           type="button"
                           class="btn btn-default btn-nofill mb-1x mr-1x"
                           style="word-break: break-all">
                            mail template
                            <strong>{{ $mail->filename }}</strong></a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <h3><strong>{{ $newslist->listName }}</strong> - subscribers list</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @forelse($subscribers as $subscriber)
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="panel-header">{{$subscriber->name}}</div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <h3 class="text-center">
                                        <small>subscription types</small>
                                        @foreach($subscriber->newsList as $list)
                                            <div class="label label-default">
                                                <a href="{{ route('web::admin::newsletter::subscribe::show', [$list->unique_id]) }}">{{ $list->listName }}</a>
                                            </div>
                                        @endforeach
                                    </h3>
                                    <small>subscriber
                                        <a href="mailto:{{ $subscriber->email }}"> quick email</a>
                                        <span class="text-info">or copy: {{ $subscriber->email }}</span>
                                    </small>
                                </div>
                                <!-- /.cols -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
            @empty
                <h1 class="text-warning text-center">You have No subscribers</h1>
            @endforelse
        </div>
        @if($subscribers->hasPages())
            <div class="pagination-wrapper">
                <div class="pagination-wrapper-inner">
                    {{ $subscribers->links() }}
                </div>
            </div>
        @endif
        <div class="clearfix"></div>
    </div><!-- /.content-body -->
    <div class="clearfix"></div>


@endsection

@section('scripts-add')
    <script src="{{asset('app/scripts/demo/page-inbox-demo.js')}}"></script>
@endsection