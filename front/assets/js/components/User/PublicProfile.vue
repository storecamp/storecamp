<template>
    <div>
        <div>
            <div class="row">
                <div class="col-sm-9">
                    <p class="lead" style="font-weight: 700">Public profile&nbsp;.</p>
                    <div class="alert alert-danger" v-if="error">
                        <p>There was an error, {{error}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        </div>
    </div>
</template>
<style>
    #updateProfile .multiselect--active {
        z-index: 3 !important;
    }
</style>
<script>
    import auth from '../../services/auth.service.js';

    export default {
        data() {
            return {
                profile: {
                },
                error: false,
                errorMsg: ''
            }
        },
        methods: {
        },
        mounted: function () {
        },
        components: {
        }
    }
</script>