<?php $user = Auth::user() ? Auth::user() : null; ?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 336px;">
        <section class="sidebar" style="height: 336px; overflow: hidden; width: auto;">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>@if($user){{ $user->name }}@else User Not Available @endif</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                    <span class="input-group-btn">
        <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                    class="fa fa-search"></i></button>
        </span>
                </div>
            </form>
            <!-- /.search form -->

            <!-- sidebar menu: : style can be found in sidebar.less -->
            {!! app('elements.menu.manager')->menu('sidebar') !!}
            {!! app('elements.menu.manager')->menu('administration') !!}
        </section>
        <div class="slimScrollBar"
             style="background: rgba(0, 0, 0, 0.2); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 114.499px;"></div>
        <div class="slimScrollRail"
             style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
    </div>
    <!-- /.sidebar -->
</aside>