<template>
    <div>
        <sub-nav-user :count="count" :msg="'AMOUNT OF USERS - '"></sub-nav-user>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Edit User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <form method="post" v-on:submit="updateUser" id="updateUser" class="col-sm-12">
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
                            <input type="submit" v-on:click="updateUser" class="btn btn-primary btn-lg form_btn"
                                   value="Update User">
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

    export default {
        data() {
            return {
                user: {
                    name: "",
                    roles: [],
                    password: ""
                },
                possibleRoles: [],
                count: 0,
                error: false,
                errorMsg: ''
            }
        },
        methods: {
            getUser(id) {
                Vue.http.get(window.BASE_URL + '/api/users/' + id)
                    .then(response => {
                        this.error = false;
                        this.user = response.data;
                    }, response => {
                        this.error = true;
                        this.errorMsg = response.error;
                    })
            },
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
            updateUser(event) {
                event.preventDefault();
                Vue.http.put(window.BASE_URL + '/api/users/update/' + this.user.id, this.user)
                    .then(response => {
                        this.error = false;
                        this.user = response.data;
                    }, response => {
                        this.error = true;
                        this.errorMsg = response.error;
                    })
            }
        },
        mounted: function () {
            this.getPossibleRoles();
            this.getUser(this.$route.params.id);
        },
        components: {
            SubNavUser,
            Multiselect
        }
    }
</script>