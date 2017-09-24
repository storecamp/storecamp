<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>  Mail form - @yield('htmlheader_title', env("APP_NAME") ) </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="shortcut icon" href="{{asset('icon.gif')}}" type="image/gif">
    <!-- Bootstrap 3.3.4 -->
    <link href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
       <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">

    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/dist/summernote.css')}}">


    <!-- Theme style -->
    <link href="{{ asset('/css/admin_lte.css') }}" rel="stylesheet" type="text/css" />

    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="{{ asset('/css/admin_skins.css') }}">
    <!-- iCheck -->
    <link href="{{ asset('/css/main/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app_less.css') }}" rel="stylesheet" type="text/css" />
    <!-- daterange picker -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head><!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
@yield('styles-add')
<body style="width: 100%">
<style>
    .selected-item {
        text-align: left;
        font-size: 20px;
        background: whitesmoke;
        margin-bottom: 5px;
        margin-top: 5px;
        border: #ddd4b0 1px solid;
        padding-top: 5px;
        padding-bottom: 10px;
        padding-left: 5px;
    }

    .files.selected-block div .item-icon {
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        width: auto;
        height: auto;
        text-align: left;
        padding-left: 5px;
    }

    .files.selected-block div {
        text-align: left;
    }

    .fa-paperclip {
        display: none;
    }
    .remove-selected {
        font-size: 12px;
        margin-top: 8px;
    }
</style>
@yield('main-content')
@include('admin.partials.scripts')
@yield("scripts-add")
@stack('scripts-add_on')
{!! Toastr::render() !!}
</body>
</html>