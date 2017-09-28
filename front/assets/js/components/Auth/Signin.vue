<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <div class="alert alert-danger" v-if="error">
                            <p>There was an error, unable to sign in with those credentials.</p>
                        </div>
                        <form autocomplete="off" v-on:submit="signin">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" v-validate="'required|email'" id="email" class="form-control" placeholder="nilsenj@me.com"
                                       v-model="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" v-model="password" required>
                            </div>
                            <button type="submit" class="btn btn-default">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import auth from '../../services/auth.service.js';

    export default {
        data() {
            return {
                email: null,
                password: null,
                error: false
            }
        },
        methods: {
            signin(event) {
                event.preventDefault();
                auth.signin(this, this.email, this.password)
            }
        }
    }
</script>