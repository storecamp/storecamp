<template>
    <div class="container-fluid">
        <sub-nav-user :count="count" :msg="'AMOUNT OF USERS - '"></sub-nav-user>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Edit User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <form method="post" v-on:submit="storeUser" id="storeUser" class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="name">Name</label>
                            <input type="text" name="name" autocomplete="off"
                                   id="name"
                                   class="form-control" v-model="user.name"
                                   placeholder="Please type your name">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                            <input type="text" name="email" autocomplete="off"
                                   id="email"
                                   class="form-control" v-model="user.email"
                                   placeholder="Please type your email">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Password</label>
                            <input type="text" name="password" autocomplete="off"
                                   id="password"
                                   class="form-control" v-model="user.password"
                                   placeholder="Please type new password">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Confirm Password</label>
                            <input type="text" name="password_confirmation" autocomplete="off"
                                   id="password_confirmation"
                                   class="form-control" v-model="user.password_confirmation"
                                   placeholder="Confirm password">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Select Role</label>
                            <multiselect v-model="user.roles" name="roles" id="roles"
                                         @tag="addRoles" :taggable="true" label="display_name"
                                         track-by="display_name" placeholder="Search role"
                                         :options="possibleRoles"
                                         :multiple="true"
                                         :searchable="true" :loading="false" :clear-on-select="true"
                                         :close-on-select="true" :options-limit="300" :limit="50">
                                <span slot="noResult">Oops! No roles found. Consider changing the search query.</span>
                            </multiselect>
                        </div>
                        <div class="form-group">
                            <button v-on:click="storeUser" class="btn btn-primary btn-lg form_btn"
                                    value="Create User">Create User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import SubNavUser from '../Partials/Subnavuser.vue';
    import Multiselect from 'vue-multiselect';
    import {router} from '../../routes.js';

    export default {
        data() {
            return {
                user: {
                    name: "",
                    email: "",
                    roles: [],
                    password: "",
                    password_confirmation: ""
                },
                possibleRoles: [],
                count: 0,
                error: false,
                errorMsg: ''
            }
        },
        methods: {
            getPossibleRoles() {
                Vue.http.get(window.BASE_URL + '/api/role_perm/roles')
                    .then(response => {
                        this.error = false;
                        this.possibleRoles = response.data;
                    }, response => {
                        this.error = true;
                        this.errorMsg = response.error;
                    })
            },
            addRoles: function (val) {
                return this.user.roles = {'name': val};
            },
            storeUser(event) {
                event.preventDefault();
                Vue.http.post(window.BASE_URL + '/api/users/store', this.user)
                    .then(response => {
                        this.error = false;
                        this.user = response.data;
                        router.push({
                            name: 'users'
                        })
                    }, response => {
                        this.error = true;
                        this.errorMsg = response.error;
                    });
            }
        },
        mounted: function () {
            this.getPossibleRoles();
        },
        components: {
            SubNavUser,
            Multiselect
        }
    }
</script>