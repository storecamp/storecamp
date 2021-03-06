<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

@include('admin.partials.htmlheader')

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
@yield('styles-add')
<body class="fixed sidebar-mini skin-blue">
<div id="app" class="wrapper">
@include('admin.partials.mainheader')
@include('admin.partials.sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.contentheader')
        <div class="clearfix"></div>
        <!-- Main content -->
        <section class="content">
            <div id="alerts" style="display: block; height: auto; width: 100%; background: whitesmoke">
                @include('components.flash.message')
            </div>
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    @include('admin.partials.controlsidebar')
</div><!-- ./wrapper -->
@include('admin.partials.scripts')
@yield('scripts-add')
@stack('scripts-add_on')
{!! Toastr::render() !!}
</body>
</html>