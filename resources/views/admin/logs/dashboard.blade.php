@extends('admin/app')
    @section('breadcrumb')
        {!! Breadcrumbs::render('LogsDashboard', 'DashBoard') !!}
    @endsection
    @section('contentheader_title')
        Log files count
        <span class="pull-right-container">
        <small class="label bg-blue text-sm">{{ count($stats->rows()) }}</small>
        </span>
    @endsection
    @section('contentheader_description')
        @if(!Route::is('log-viewer::dashboard'))
            <b>
                <a href="{{ route('log-viewer::dashboard') }}">
                    <i class="fa fa-dashboard"></i> Dashboard
                </a>
            </b>
        @else
            <b>
                <a href="{{ route('log-viewer::logs.list') }}">
                    <i class="fa fa-archive"></i>See All Logs
                </a>
            </b>
        @endif
    @endsection
@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Dashboard</h1>
            <div class="row">
                <div class="col-md-3">
                    <canvas id="stats-doughnut-chart" height="300"></canvas>
                </div>
                <div class="col-md-9">
                    <section class="box-body">
                        <div class="row">
                            @foreach($percents as $level => $item)
                                <div class="col-md-4">
                                    <div class="info-box level level-{{ $level }} {{ $item['count'] === 0 ? 'level-empty' : '' }}">
                                <span class="info-box-icon">
                                    {!! log_styler()->icon($level) !!}
                                </span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">{{ $item['name'] }}</span>
                                            <span class="info-box-number">
                                        {{ $item['count'] }} entries - {{ $item['percent'] }} %
                                    </span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: {{ $item['percent'] }}%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles-add')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.15.35/css/bootstrap-datetimepicker.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Source+Sans+Pro:400,600' rel='stylesheet'
          type='text/css'>
    @include('admin.logs._template.style')
@endsection
@include('admin.logs._template.footer')


@section('scripts-add')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.1/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.15.35/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        Chart.defaults.global.responsive = true;
        Chart.defaults.global.scaleFontFamily = "'Source Sans Pro'";
        Chart.defaults.global.animationEasing = "easeOutQuart";
    </script>
    <script>
        $(function () {
            new Chart($('canvas#stats-doughnut-chart'), {
                type: 'doughnut',
                data: {!! $chartData !!},
                options: {
                    legend: {
                        position: 'bottom'
                    }
                }
            });
        });
    </script>
@endsection
