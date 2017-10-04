<template>
    <div class="container-fluid">
    </div>
</template>
<script>
    import Pagination from '../System/pagination.vue';

    export default {
        data() {
            return {
                logs: [],
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

        },
        mounted: function () {

        },
        components: {
            Pagination
        }
    }
</script>