<template>
    <div>
        <navigation :auth="auth"></navigation>
        <router-view :auth="auth"></router-view>
    </div>
</template>
<style>
    body {
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        font-size: 14px;
        line-height: 1.42857143;
        color: #333;
        background-color: #fff;
    }
    .container {
        max-width: 960px;
    }
    .navbar-default {
        background-color: #f8f8f8;
        border-color: #e7e7e7;
    }
</style>
<script>
    import auth from '../services/auth.service.js'

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
        }
    }
</script>