<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

@include('site.partials.htmlheader')
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
<body class="hold-transition layout-top-nav">
<div class="wrapper">
    @include('site.partials.mainheader')
    <div class="container-fluid">
        <!-- Content Wrapper. Contains page content -->
        @include('site.partials.contentheader')
        <div class="clearfix"></div>
        <!-- Main content -->
        <section class="content">
            <div id="alerts" style="display: block; height: auto; width: 100%; background: whitesmoke">
                @include('components.flash.message')
            </div>
            <div class="col-md-2 col-sm-3">
                @include('site.partials.sidebar')
            </div>
            <!-- Your Page Content Here -->
            <div class="col-md-10 col-sm-9">
                @yield('breadcrumbs')
                @yield('main-content')
            </div>
        </section><!-- /.content -->
    </div>
</div>
@include('partials.scripts')
@yield("scripts-add")
@stack('scripts-add_on')
{!! Toastr::render() !!}
</body>
</html>