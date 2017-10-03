<template>
    <div>
        <section class="content-header row" style="margin-bottom: 10px">
            <h4>
                {{msg}}
                <span class="pull-right-container">
                                    <small class="label bg-blue text-sm">{{count}}</small>
                        </span>
            </h4>
            <ol class="breadcrumb">
            </ol>
            <small>
                <div class="btn-group" style="">
                    <router-link v-if="(routeName != 'usersCreate') && (routeName != 'usersEdit')"
                                 active-class="disabled" :to="{ name: 'usersCreate'}" class="btn btn-info">Add New User
                    </router-link>
                    <router-link v-if="(routeName === 'usersCreate') || (routeName === 'usersEdit')"
                                 :to="{ name: 'users' }" class="btn btn-info">All Users
                    </router-link>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-filter fa-fw"></i> Options <span class="fa fa-angle-down"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                    </ul>
                </div>
            </small>
            <div class="clearfix"></div>
        </section>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                count: 0,
                error: false,
                errorMsg: '',
                routeName: ''
            }
        },
        props: ['count', 'msg'],
        methods: {},
        mounted: function () {
            this.routeName = this.$route.name;
            console.log(this.$route.name);
        },
        components: {}
    }
</script>