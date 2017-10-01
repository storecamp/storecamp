<template>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->

        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 438px;">
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu ">
                    <li class="header">
                        MAIN NAVIGATION
                    </li>
                    <li class="treeview item ">
                        <a class="link" href="http://storecamp.dev/en/admin">

                            <i class="fa fa-th"></i> Widgets

                        </a>
                    </li>
                    <li class="treeview  ">
                        <a class="link" href="http://storecamp.dev/en/admin/products">

                            <i class="fa fa-cube"></i>Manage Products

                        </a>
                        <ul class="treeview-menu ">
                            <li class="treeview item ">
                                <a class="link" href="http://storecamp.dev/en/admin/products">

                                    List of Products

                                </a>
                            </li>
                            <li class="treeview item ">
                                <a class="link" href="http://storecamp.dev/en/admin/products/create">

                                    Create Product

                                </a>
                            </li>
                            <li class="treeview item ">
                                <a class="link" href="http://storecamp.dev/en/admin/reviews/index">

                                    <span class="nav-text"> Reviews</span>

                                </a>
                            </li>
                            <li class="treeview item ">
                                <a class="link" href="http://storecamp.dev/en/admin/categories">

                                    Categories

                                </a>
                            </li>
                            <li class="treeview item ">
                                <a class="link" href="http://storecamp.dev/en/admin/attributes">

                                    Attributes

                                </a>
                            </li>
                            <li class="treeview item ">
                                <a class="link" href="http://storecamp.dev/en/admin/attribute_groups">

                                    Attribute Groups

                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview  ">
                        <a class="link" href="http://storecamp.dev/en/admin/sales/orders">

                            <i class="fa fa-shopping-cart"></i> Sales

                        </a>
                        <ul class="treeview-menu ">
                            <li class="treeview item ">
                                <a class="link" href="http://storecamp.dev/en/admin/sales/orders">

                                    Orders

                                </a>
                            </li>
                            <li class="treeview item ">
                                <a class="link" href="http://storecamp.dev/en/admin/attribute_groups">

                                    Returns

                                </a>
                            </li>
                            <li class="treeview item ">
                                <a class="link" href="http://storecamp.dev/en/admin/attribute_groups">

                                    Promocodes

                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview  ">
                        <a class="link" href="http://storecamp.dev/en/admin/subscribers">

                            <i class="fa fa-line-chart"></i> Marketing

                        </a>
                        <ul class="treeview-menu ">
                            <li class="treeview item ">
                                <a class="link" href="http://storecamp.dev/en/admin/subscribers">

                                    Subscribers

                                </a>
                            </li>
                            <li class="treeview item ">
                                <a class="link" href="http://storecamp.dev/en/admin/mail/index">

                                    Mail

                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview  ">
                        <a class="link" href="http://storecamp.dev/en/admin/design/pages">

                            <i class="fa fa-paint-brush"></i> Design

                        </a>
                        <ul class="treeview-menu ">
                            <li class="treeview item ">
                                <a class="link" href="http://storecamp.dev/en/admin/design/pages">

                                    Static Pages

                                </a>
                            </li>
                            <li class="treeview item ">
                                <a class="link" href="http://storecamp.dev/en/admin/design/banners">

                                    Banners

                                </a>
                            </li>
                            <li class="treeview item ">
                                <a class="link" href="http://storecamp.dev/en/admin/design/menus">

                                    Menus

                                </a>
                            </li>
                        </ul>
                    </li>
                    <router-link active-class="active" exact-active-class="active" :to="{ name: 'users' }"
                                 class="treeview item " tag="li">
                        <a class="link">
                            <i class="fa fa-user"></i>
                            Users
                        </a>
                    </router-link>
                </ul>
                <ul class="sidebar-menu ">
                    <li class="header">
                        Administration
                    </li>
                    <li class="treeview item ">
                        <a class="link" href="http://storecamp.dev/en/admin/parsers/index">

                            <i class="fa fa-suitcase"></i> Parsers

                        </a>
                    </li>
                    <li class="treeview  ">
                        <a class="link" href="http://storecamp.dev/en/admin/log-viewer">

                            <i class="fa fa-bug"></i> LogsViewer

                        </a>
                        <ul class="treeview-menu ">
                            <li class="treeview item ">
                                <a class="link" href="http://storecamp.dev/en/admin/log-viewer">

                                    <i class="fa fa-dashboard"></i> Dashboard

                                </a>
                            </li>
                            <li class="treeview item ">
                                <a class="link" href="http://storecamp.dev/en/admin/log-viewer/logs">

                                    <i class="fa fa-archive"></i> Logs

                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview  ">
                        <a class="link" href="http://storecamp.dev/en/admin/roles">

                            <i class="fa fa-key"></i> Access

                        </a>
                        <ul class="treeview-menu ">
                            <li class="treeview item ">
                                <a class="link" href="http://storecamp.dev/en/admin/roles">

                                    All roles

                                </a>
                            </li>
                            <li class="treeview item ">
                                <a class="link" href="http://storecamp.dev/en/admin/roles/create">

                                    Create role

                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview  ">
                        <a class="link" href="http://storecamp.dev/en/admin/media/index">

                            <i class="fa fa-files-o"></i> MediaStorage

                        </a>
                        <ul class="treeview-menu ">
                            <li class="treeview item ">
                                <a class="link" href="http://storecamp.dev/en/admin/media/index">

                                    Media Storage

                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview  ">
                        <a class="link" href="http://storecamp.dev/en/admin/settings/default">

                            <i class="fa fa-cogs"></i> Settings

                        </a>
                        <ul class="treeview-menu ">
                            <li class="treeview item ">
                                <a class="link" href="http://storecamp.dev/en/admin/settings/default">

                                    Settings

                                </a>
                            </li>
                            <li class="treeview item ">
                                <a class="link" href="http://storecamp.dev/en/admin/settings/currency">

                                    Currencies

                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </section>
        </div>
        <!-- /.sidebar -->
    </aside>
</template>


<script>
    export default {
        data() {
            return {}
        },
        methods: {},
        mounted() {
            (function ($) {
                var items;
                items = [$('.sidebar-menu'), $('.media_tags'), $('.site_sidebar'), $('.default-menu')];
                items.forEach(function (item, i, arr) {
                    var makeAnchorActive, nav;
                    nav = item;
                    makeAnchorActive = function (navigtation) {
                        var activeParents, anchor, current, definedLinks, results;
                        anchor = navigtation.find('a');
                        current = window.location.href;
                        i = 0;
                        results = [];
                        while (i < anchor.length) {
                            definedLinks = anchor[i].href;
                            if (definedLinks === current) {
                                activeParents = nav.attr('data-active-parents');
                                if (activeParents) {
                                    $(anchor[i]).parent().parent().closest('li').addClass('active');
                                    $(anchor[i]).parent().addClass('active');
                                } else {

                                }
                                $(anchor[i]).parent().addClass('active');
                            }
                            results.push(i++);
                        }
                        return results;
                    };
                    return makeAnchorActive(nav);
                });
            })($);
        }
    }
</script>