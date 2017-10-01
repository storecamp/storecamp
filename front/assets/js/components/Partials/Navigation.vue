<template>
    <div>
        <header class="main-header">
            <!-- Logo -->
            <a href="http://storecamp.dev/admin/dashboard" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">
                    <img src="http://storecamp.dev/img/Logo!.png" alt="storecamp">
                </span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg navbar-brand">
                    <img style="" src="http://storecamp.dev/img/Logo!.png"
                                                        alt="storecamp"></span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <router-link :to="{ name: 'dash' }">Dash</router-link>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-language"></i>
                                en <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="http://storecamp.dev/en/language/de">German</a></li>
                                <li class="active"><a href="http://storecamp.dev/en/language/en">English</a></li>
                                <li><a href="http://storecamp.dev/en/language/es">Spanish</a></li>
                                <li><a href="http://storecamp.dev/en/language/fr">French</a></li>
                                <li><a href="http://storecamp.dev/en/language/ru">Russian</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="pull-right" v-if="!auth.user.authenticated">
                            <router-link :to="{ name: 'register' }">Register</router-link>
                        </li>
                        <li class="pull-right" v-if="!auth.user.authenticated">
                            <router-link :to="{ name: 'signin' }">Sign in</router-link>
                        </li>
                        <li class="pull-right" v-if="auth.user.authenticated">
                            <a href="javascript:void(0)" v-on:click="signout">Sign out</a>
                        </li>
                        <li class="pull-right" v-if="auth.user.authenticated">
                            <router-link :to="{ name: 'profile' }">
                                Hi, {{ auth.user.profile.name }}
                            </router-link>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    </div>
</template>
<script>
    export default {
        props: ['auth'],
        data() {
            return {
                roles: []
            }
        },
        created() {
            let _this = this;
            this.eventHub.$on('user:visibility', function (status) {
                _this.auth.user.profile.visible = status.visible;
            });
        },
        methods: {
            signout() {
                this.auth.signout()
            }
        },
        events: {
            'user:visibility': function (data) {
                // do your stuff here
                console.log(data);
            }
        },
        mounted() {
            console.log('Navigation mounted.')
        }
    }
</script>