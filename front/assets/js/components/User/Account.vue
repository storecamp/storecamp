<template>
    <div class="container">
        <div class="page-header">
            <h1>My Account</h1>
            <p v-if="visible == 'visible'" style="font-size: 13px;">
                    <b class="text-success">Profile {{visible}}</b>
                    <a v-on:click="toggleVisibility($event)">(turn off)</a>
                    <a v-if="visible != 'visible'"  v-on:click="toggleVisibility($event)">(turn on)</a>
                    &nbsp;•&nbsp;&nbsp;<a href="/q/67680705/" target="_blank"><i class="icon-hand-right"></i>Watch public profile</a>
            </p>
            <p v-if="visible != 'visible'" style="font-size: 13px;">
                    <b class="text-warning">Profile {{visible}}</b>
                    <a   v-on:click="toggleVisibility($event)">(turn on)</a>
                    &nbsp;•&nbsp;&nbsp;<a href="/q/67680705/" target="_blank"><i class="icon-hand-right"></i>Watch public profile</a>
            </p>
            <ul class="nav nav-pills" style="margin: 1.5em 0 1em;">
                <router-link tag="li" exact-active-class="active" to="/account/profile">
                    <router-link :to="{ name: 'profile' }">Profile</router-link>
                </router-link>
                <router-link tag="li" exact-active-class="active" to="/account/skills">
                    <router-link :to="{ name: 'skills' }">Skills</router-link>
                </router-link>
                <router-link tag="li" exact-active-class="active" to="/account/contact">
                    <router-link :to="{ name: 'contact' }">Contacts and Resume</router-link>
                </router-link>
                <router-link tag="li" exact-active-class="active" to="/account/additional_settings">
                    <router-link :to="{ name: 'additional_settings' }">Additional Settings</router-link>
                </router-link>
            </ul>
        </div>
        <router-view></router-view>
    </div>
</template>
<style>
    .form-group {
        margin-left: 0!important;
    }
    .form-inline .form-group {
        width: 100%;
    }
</style>
<script>
    import auth from '../../services/auth.service.js';
    import vueSlider from 'vue-slider-component'
    import Multiselect from 'vue-multiselect'

    export default {
        data() {
            return {
                visible: 'visible',
                error: false,
                errorMsg: ''
            }
        },
        methods: {
            getAccountStatus() {
                Vue.http.get(
                    'api/profile/getVisibility',
                    {}
                ).then(response => {
                    this.error = false;
                    this.visible = response.body.visible;
                }, response => {
                    this.error = true;
                    this.errorMsg = response.error;
                })
            }
        },
        mounted: function () {
            this.getAccountStatus();
        },
        components: {
        }
    }
</script>