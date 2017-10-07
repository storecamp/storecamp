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
                    <router-link
                                 :to="{ name: 'rolesCreate'}" class="btn btn-info">
                                 Add New Role
                    </router-link>
                    <router-link v-if="(routeName === 'rolesCreate') || (routeName === 'rolesEdit')"
                                 :to="{ name: 'users' }" class="btn btn-info">All Roles
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
        props: ['msg'],
        methods: 
        {
            getRolesCount() {
                 Vue.http.get(window.BASE_URL + '/api/access/getRolesCount')
                    .then(response => {
                        this.error = false;
                        this.count = response.data;
                    }, response => {
                        this.error = true;
                        this.errorMsg = response.error;
                })
            }
        },
        mounted: function () {
            this.getRolesCount();
        },
        components: {}
    }
</script>