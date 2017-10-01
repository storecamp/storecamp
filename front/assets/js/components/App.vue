<template>
    <div>
        <navigation :auth="auth"></navigation>
        <sidebar :auth="auth"></sidebar>
        <div class="wrapper">
            <router-view style="max-width: inherit;" class="container-fluid content-wrapper" :auth="auth"></router-view>
        </div>
    </div>
</template>
<style></style>
<script>
    import auth from '../services/auth.service.js'

    export default {
        data() {
            return {
                auth: auth
            }
        },
        methods: {},
        mounted: function () {
            this.$nextTick(function () {
                auth.check()
            })
        }
    }
</script>