<template>
    <div class="container-fluid">
        <div class="login-box">
            <div class="login-logo">
                <b>Storecamp - Admin</b>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <div class="alert alert-danger" v-if="error">
                    <p>There was an error, unable to sign in with those credentials.</p>
                </div>
                <form method="post" autocomplete="off" v-on:submit="signin">
                    <div class="form-group has-feedback">
                        <input type="email" v-validate="'required|email'" id="email" class="form-control" placeholder="Your Email"
                        v-model="email" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" id="password" class="form-control" v-model="password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!-- /.social-auth-links -->

                <a href="/password/reset">I forgot my password</a><br>
            </div>
            <!-- /.login-box-body -->
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