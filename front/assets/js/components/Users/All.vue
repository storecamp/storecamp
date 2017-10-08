<template>
    <div class="container-fluid">
        <sub-nav-user :count="count" :msg="'AMOUNT OF USERS - '"></sub-nav-user>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List of Users</h3>
                <div class="box-tools">
                    <!--<ul class="pagination pagination-sm no-margin pull-right">-->
                    <!--<li><a href="#">«</a></li>-->
                    <!--<li><a href="#">1</a></li>-->
                    <!--<li><a href="#">2</a></li>-->
                    <!--<li><a href="#">3</a></li>-->
                    <!--<li><a href="#">»</a></li>-->
                    <!--</ul>-->
                    <pagination v-bind:pagination="pagination"
                                v-on:click.native="getAllUsers(pagination.current_page)"
                                :offset="offset"
                    ></pagination>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table">
                    <tbody>
                    <tr>
                        <th style="width: 10px">Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th class="text-center"><em class="fa fa-cog"></em> Actions</th>
                    </tr>
                    <tr v-for="user in users">
                        <td>{{user.id}}</td>
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td v-html="__transformRoles(user.roles)"></td>
                        <td>{{user.created_at}}</td>
                        <td>{{user.updated_at}}</td>
                        <td>
                            <router-link :to="{ name: 'usersEdit', params: { id: user.id }}"
                                         class="btn btn-default edit" title="Edit">
                                <em class="fa fa-pencil-square-o"></em></router-link>
                            <button v-if="user.banned" role="link" class="btn btn-warning text-warning" :data-id="user.id"  v-on:click="toggleBan">
                                unban
                            </button>
                            <button v-if="!user.banned" role="link" class="btn btn-default text-warning" :data-id="user.id"  v-on:click="toggleBan">
                                ban
                            </button>
                            <button v-on:click="deleteUser" :data-id="user.id" class="btn btn-danger delete text-warning" role="link"
                                    title="Are you sure you want to delete?"><em v-on:click="deleteUser" :data-id="user.id" class="fa fa-trash-o"></em></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <pagination v-bind:pagination="pagination"
                            v-on:click.native="getAllUsers(pagination.current_page)"
                            :offset="offset"
                ></pagination>
            </div>
        </div>
    </div>
</template>
<script>
    import SubNavUser from '../Partials/Subnavuser.vue';
    import Pagination from '../System/pagination.vue';

    export default {
        data() {
            return {
                users: [],
                pagination: {
                    total: 0,
                    per_page: 2,
                    from: 1,
                    to: 0,
                    current_page: 1
                },
                offset: 4,
                count: 0,
                error: false,
                errorMsg: ''
            }
        },
        methods: {
            getAllUsers(page) {
                Vue.http.get(window.BASE_URL + '/api/users?page=' + page)
                    .then(response => {
                        this.error = false;
                        this.users = response.data.data;
                        delete(response.data.data);
                        this.pagination = response.data;
                    }, response => {
                        this.error = true;
                        this.errorMsg = response.error;
                    })
            },
            deleteUser(e) {
                console.log($(e.target));
                let userId = $(e.target).attr('data-id');
                Vue.http.delete(window.BASE_URL + '/api/users/' + userId)
                    .then(response => {
                        this.error = false;
                        let page = this.$route.query.page ? this.$route.query.page : this.pagination.current_page;
                        this.getAllUsers(page);
                    }, response => {
                        this.error = true;
                        this.errorMsg = response.error;
                    })
            },
            toggleBan(e) {
                console.log($(e.target));
                let userId = $(e.target).attr('data-id');
                Vue.http.get(window.BASE_URL + '/api/users/toggleBan/' + userId)
                    .then(response => {
                        this.error = false;
                        let page = this.$route.query.page ? this.$route.query.page : this.pagination.current_page;
                        this.getAllUsers(page);
                    }, response => {
                        this.error = true;
                        this.errorMsg = response.error;
                    })
            },
            __transformRoles(roles) {
                let rolesArr = [];
                roles.forEach(function (item, arr) {
                    rolesArr.push('<b style="text-decoration: underline">'
                        + item.name + '</b>' + '<br>');
                });

                return rolesArr.join(", ");
            }
        },
        mounted: function () {
            let page = this.$route.query.page ? this.$route.query.page : this.pagination.current_page;
            this.getAllUsers(page);
        },
        components: {
            SubNavUser,
            Pagination
        }
    }
</script>