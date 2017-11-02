<template>
    <div class="container-fluid">
        <sub-nav-access :msg="'AMOUNT OF ROLES - '"></sub-nav-access>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List of Roles</h3>
                <div class="box-tools">
                    <pagination v-bind:pagination="pagination"
                                v-on:click.native="getAllRoles(pagination.current_page)"
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
                        <th>Display Name</th>
                        <th>Description</th>
                        <th>Permissions</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th class="text-center"><em class="fa fa-cog"></em> Actions</th>
                    </tr>
                    <tr v-for="role in roles">
                        <td>{{role.id}}</td>
                        <td>{{role.name}}</td>
                        <td>{{role.display_name}}</td>
                        <td>{{role.description}}</td>
                        <td v-html="__transformRoles(role.perms)"></td>
                        <td>{{role.created_at}}</td>
                        <td>{{role.updated_at}}</td>
                        <td class="text-center">
                            <strong v-if="role.default" class="text-warning">
                                This role is default! <br>Cannot be Edited or Deleted!
                            </strong>
                            <router-link v-if="!role.default" :to="{ name: 'rolesEdit', params: { id: role.id }}"
                                         class="btn btn-default edit" title="Edit">
                                <em class="fa fa-pencil-square-o"></em></router-link>
                            <button v-if="!role.default" v-on:click="deleteRole" :data-id="role.id" class="btn btn-danger delete text-warning" role="link"
                                    title="Are you sure you want to delete?"><em v-on:click="deleteRole" :data-id="role.id" class="fa fa-trash-o"></em></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <pagination v-bind:pagination="pagination"
                            v-on:click.native="getAllRoles(pagination.current_page)"
                            :offset="offset"
                ></pagination>
            </div>
        </div>
    </div>
</template>
<script>

    import SubNavAccess from '../Partials/SubNavAccess.vue';
    import Pagination from '../System/pagination.vue';

    export default {
        data() {
            return {
                roles: [],
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
            getAllRoles(page) {
                Vue.http.get(window.BASE_URL + '/api/access/roles?page=' + page)
                    .then(response => {
                        this.error = false;
                        this.roles = response.data.data;
                        delete(response.data.data);
                        this.pagination = response.data;
                    }, response => {
                        this.error = true;
                        this.errorMsg = response.error;
                    })
            },
            deleteRole(e) {
                let rolesId = $(e.target).attr('data-id');
                Vue.http.post(window.BASE_URL + '/api/access/roles/delete/' + rolesId)
                    .then(response => {
                        this.error = false;
                        let page = this.$route.query.page ? this.$route.query.page : this.pagination.current_page;
                        this.getAllRoles(page);
                    }, response => {
                        this.error = true;
                        this.errorMsg = response.error;
                    })
            },
            __transformRoles(permissions) {
                let permissionsArr = [];
                permissions.forEach(function (item, arr) {
                    permissionsArr.push('<b style="text-decoration: underline">'
                        + item.name + '</b>' + '<br>');
                });

                return permissionsArr.join(" ");
            }
        },
        mounted: function () {
            let page = this.$route.query.page ? this.$route.query.page : this.pagination.current_page;
            this.getAllRoles(page);
        },
        components: {
            SubNavAccess,
            Pagination
        }
    }
</script>