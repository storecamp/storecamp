<template>
    <div>
        <navigation :auth="auth"></navigation>
        <sidebar :auth="auth"></sidebar>
        <router-view  :key="routeKey" class="content-wrapper" :auth="auth"></router-view>
    </div>
</template>
<style></style>
<script>
    import auth from '../services/auth.service.js';
    import storecamp from './Storecamp';
    export default {
        data() {
            return {
                auth: auth,
                routeKey: this.$route.name + this.$route.params + this.$route.query
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