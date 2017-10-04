<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta base="/front">
    <!-- Styles -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Fixed Layout</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('plugins/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link href="{{ asset('front/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/admin_skins.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="{{ asset('css/vue-multiselect.min.css') }}" rel="stylesheet">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div id="app" class="wrapper">
</div>
<script>
    window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
</script>
<script src="{{ asset('plugins/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('plugins/toastr/toastr.js') }}"></script>

<!-- Scripts -->
<script src="{{ asset('front/js/app.js') }}"></script>
<script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- SlimScroll 1.3.0 -->
<!-- iCheck 1.0.1 -->
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/bower-jquery-sparkline/dist/jquery.sparkline.retina.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('custom_vendors/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('custom_vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{ asset('plugins/chart.js/Chart.js') }}"></script>
<script src="{{ asset('plugins/morris.js/morris.min.js') }}"></script>
<script>
    toastr.options = {
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 5000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
</body>
</html>
