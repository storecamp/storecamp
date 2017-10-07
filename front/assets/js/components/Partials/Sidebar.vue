<template>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 336px;">
            <section class="sidebar" style="height: 336px; overflow: hidden; width: auto;">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel" style="">
                    <div class="pull-left text-center">
                        <strong v-if="auth.user.authenticated" class="text-muted ">
                            <i class="fa fa-circle text-success"></i> {{ auth.user.profile.name }}
                        </strong>
                    </div>
                </div>
                <form class="sidebar-form" id="search-type" method="get" role="search"
                      style="margin: initial;overflow: visible">
                    <div class="input-group" style="width: 100%;">
                        <input name="search" type="search" class="form-control search-input pull-right"
                               style="width: inherit; position: relative; margin-right: 1px; border: 1px solid #ddd; background-color: #e5e5e5;"
                               placeholder="Search">
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <ul class="sidebar-menu ">
                    <li class="header">
                        MAIN NAVIGATION
                    </li>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <router-link active-class="active" exact-active-class="active" :to="{ name: 'users' }"
                                 class="treeview item " tag="li">
                        <a class="link">
                            <i class="fa fa-user"></i>
                            Users
                        </a>
                    </router-link>
                    <router-link active-class="active" exact-active-class="active" :to="{ name: 'logsDash' }"
                                 class="treeview item " tag="li">
                        <a class="link">
                            <i class="fa fa-bug"></i>
                            Logs
                        </a>
                    </router-link>

                </ul>
            </section>
            <div class="slimScrollBar"
                 style="background: rgba(0, 0, 0, 0.2); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 114.499px;"></div>
            <div class="slimScrollRail"
                 style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
        </div>
        <!-- /.sidebar -->
    </aside>
</template>


<script>
    export default {
        data() {
            return {}
        },
        props: ['auth'],
        methods: {},
        mounted() {
        }
    }
</script>