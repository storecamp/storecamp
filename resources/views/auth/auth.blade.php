<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

@include('partials.htmlheader')

<!--
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
@yield("styles-add")
<body class="fixed sidebar-mini skin-blue-light">
<div class="wrapper">

{{--@include('partials.mainheader')--}}

{{--@include('partials.sidebar')--}}

<!-- Content Wrapper. Contains page content -->
{{--@include('partials.contentheader')--}}

<!-- Main content -->
    <section class="content">
        @if (Session::has('flash_notification.message'))
            <div class="alert alert-{{ Session::get('flash_notification.level') }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                {{ Session::get('flash_notification.message') }}
            </div>
        @endif
        @yield('content')

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

{{--@include('partials.controlsidebar')--}}


@include('partials.scripts')
@yield("scripts-add")
{!! Toastr::render() !!}
</body>
</html>