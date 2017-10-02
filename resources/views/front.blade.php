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
    <link href="{{ asset('css/main/app.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/admin_skins.css') }}">
    <link href="{{ asset('/css/main/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app_less.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/vue-multiselect.min.css') }}" rel="stylesheet">
</head>
<body class="sidebar-mini skin-blue">
<div id="app" class="wrapper"></div>

<script>
    window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
</script>

<!-- Scripts -->
<script src="{{ asset('front/js/app.js') }}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/lib/fastclick.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/bower-jquery-sparkline/dist/jquery.sparkline.retina.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('custom_vendors/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('custom_vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{ asset('plugins/chart.js/Chart.js') }}"></script>
<script src="{{ asset('plugins/morris.js/morris.min.js') }}"></script>
<script src="{{ asset('plugins/toastr/toastr.js') }}"></script>

</body>
</html>
