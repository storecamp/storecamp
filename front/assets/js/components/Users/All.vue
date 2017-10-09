<template>
    <div class="container-fluid">
        <sub-nav-user :msg="'AMOUNT OF USERS - '"></sub-nav-user>
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
                    <tr v-bind:key="user.id" v-for="user in users">
                        <td>{{user.id}}</td>
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td v-html="__transformRoles(user.roles)"></td>
                        <td>{{user.created_at}}</td>
                        <td>{{user.updated_at}}</td>
                        <td class="text-center" v-if="!__inAdminRolesList(user.roles)">
                            <router-link :to="{ name: 'usersEdit', params: { id: user.id }}"
                                         class="btn btn-default edit" title="Edit">
                                <em class="fa fa-pencil-square-o"></em></router-link>
                            <button v-if="user.banned" role="link" class="btn btn-warning text-warning" :data-id="user.id"  v-on:click="toggleBan">
                                unban
                            </button>
                            <button v-if="!user.banned" role="link" class="btn btn-default text-warning" :data-id="user.id"  v-on:click="toggleBan">
                                ban
                            </button>
                            <button :data-href="'delete-user-'+user.id" :data-id="user.id" class="btn btn-danger delete text-warning" role="link"
                                    title="Are you sure you want to delete?"><em :data-id="user.id" :data-href="'delete-user-'+user.id" class="fa fa-trash-o"></em></button>
                            <modal title="Are you sure to delete the user?" :confirmData="{id: user.id}" :modalId="'delete-user-'+user.id" :triggerConfirm="deleteUser" :content="'User ' + user.name + ' is going to be deleted!'"></modal>   
                        </td>
                        <td  class="text-center" v-else><strong class="text-warning">User is admin</strong></td>
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
    import Modal from '../Partials/Modal.vue';
    import Pagination from '../System/pagination.vue';

    export default {
        data() {
            return {
                users: [],
                auth: {},
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
            deleteUser(e, data) {
                Vue.http.delete(window.BASE_URL + '/api/users/' + data.id)
                    .then(response => {
                        this.error = false;
                        toastr.success('User Deleted!');
                        let page = this.$route.query.page ? this.$route.query.page : this.pagination.current_page;
                        this.getAllUsers(page);
                    }, response => {
                        this.error = true;
                        this.errorMsg = response.data.msg;
                        console.log(response);
                        if(response.data.msg) {
                            toastr.error('User Not Deleted! ' + response.data.msg);
                        } else {
                            toastr.error('User Not Deleted!');
                        }
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
            __inAdminRolesList(roles) {
                let counter = 0;
                roles.forEach(function (item, index, arr) {
                    if(item.display_name == 'admin') {
                        counter++;
                    }
                });
                if(counter) {
                    return true;
                } else {
                    return false;
                }
            },
            __transformRoles(roles) {
                let rolesArr = [];
                roles.forEach(function (item, arr) {
                    rolesArr.push('<b style="text-decoration: underline">'
                        + item.name + '</b>' + '<br>');
                });

                return rolesArr.join(", ");
            },
            triggerConfirm(event) {
                console.log('Hello confirm modal');
            }
        },
        mounted: function () {
            let page = this.$route.query.page ? this.$route.query.page : this.pagination.current_page;
            this.getAllUsers(page);
            this.auth = this.$parent.auth;
        },
        components: {
            SubNavUser,
            Modal,
            Pagination
        }
    }
</script>