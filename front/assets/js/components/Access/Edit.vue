<template>
    <div class="container-fluid">
        <sub-nav-access :msg="'AMOUNT OF ROLES - '"></sub-nav-access>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Edit Role</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    
                    <form method="post" v-on:submit="editRole" id="editRole" class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="name">Name Of Role</label>
                            <input type="text" name="name" autocomplete="off" id="name" class="form-control" v-model="role.name" placeholder="Please type your name">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="display_name">Alias of role</label>
                            <input type="text" name="display_name" autocomplete="off" id="display_name" class="form-control" 
                            v-model="role.display_name" placeholder="Please type alias for role">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Description</label>
                            <textarea name="description" autocomplete="off" id="description" class="form-control" v-model="role.description"
                             placeholder="Please type description"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Select Permissions</label>
                            <multiselect v-model="role.permissions" name="permissions" id="permissions" @tag="addPermissions" :taggable="true" 
                            label="display_name" track-by="display_name" 
                            placeholder="Search role" :options="possiblePermissions" :multiple="true" :searchable="true" :loading="false" 
                            :clear-on-select="true" :close-on-select="true" :options-limit="300" :limit="50">
                                <span slot="noResult">Oops! No permissions found. Consider changing the search query.</span>
                            </multiselect>
                        </div>

                        <div class="form-group">
                            <button v-on:click="editRole" class="btn btn-primary btn-lg form_btn" value="Create User">Create Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import SubNavAccess from '../Partials/SubNavAccess.vue';
import Multiselect from 'vue-multiselect';
import { router } from '../../routes.js';
export default {
    
    data() {
        return {
            role: {
                name: "",
                description: "",
                permissions: [],
                display_name: ""
            },
            possiblePermissions: [],
            count: 0,
            error: false,
            errorMsg: ''
        }
    },
    methods: {
        getRole(id) {
            Vue.http.get(window.BASE_URL + '/api/access/roles/' + id)
                .then(response => {
                    this.error = false;
                    this.role = response.data.role;
                    this.role.permissions = response.data.role.perms;
                    delete(response.data.role.perms);
                }, response => {
                    this.error = true;
                    this.errorMsg = response.error;
                })
        },
        getPossiblePermissions() {
            Vue.http.get(window.BASE_URL + '/api/access/getAllPermissions')
                .then(response => {
                    this.error = false;
                    this.possiblePermissions = response.data;
                }, response => {
                    this.error = true;
                    this.errorMsg = response.error;
                })
        },
        addPermissions: function(val) {
            return this.role.permissions = { 'name': val };
        },
        editRole(event) {
            event.preventDefault();
            console.log(this.role);
            Vue.http.put(window.BASE_URL + '/api/access/roles/update/' + this.role.id, this.role)
                .then(response => {
                    this.error = false;
                    this.role = response.data;
                    router.push({
                        name: 'access'
                    })
                }, response => {
                    this.error = true;
                    this.errorMsg = response.error;
                });
        }
    },
    mounted: function() {
        let roleId = this.$route.params.id;
        this.getRole(roleId);
        this.getPossiblePermissions();
    },
    components: {
        SubNavAccess,
        Multiselect
    }
}
</script>