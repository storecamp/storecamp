<template>
    <div>
        <navigation :auth="auth"></navigation>
        <sidebar :auth="auth"></sidebar>
        <router-view class="content-wrapper" :auth="auth"></router-view>
    </div>
</template>
<style></style>
<script>
    import auth from '../services/auth.service.js';
    import storecamp from './Storecamp';
    export default {
        data() {
            return {
                auth: auth
            }
        },
        methods: {
            
        },
        mounted: function () {
            this.$nextTick(function () {
                auth.check()
            })
        },
        components: {
            storecamp
        }
    }
</script>