<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <div class="alert alert-danger" v-if="error && !success">
                            <p>There was an error, unable to complete registration.</p>
                        </div>
                        <div class="alert alert-success" v-if="success">
                            <p>Registration completed. You can now
                                <router-link :to="{ name: 'signin' }">sign in</router-link>
                                .</p>
                        </div>
                        <form autocomplete="off" v-on:submit="register" v-if="!success">
                            <div class="form-group" v-bind:class="{ 'has-error': error && response.username }">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" v-model="name" required>
                                <span class="help-block" v-if="error && response.name">{{ response.name }}</span>
                            </div>
                            <div class="form-group" v-bind:class="{ 'has-error': error && response.email }">
                                <label for="email">E-mail</label>
                                <input type="email" v-validate="'required|email'" id="email" class="form-control" placeholder="john@hooli.com"
                                       v-model="email"
                                       required>
                                <span class="help-block" v-if="error && response.email">{{ response.email }}</span>
                            </div>
                            <div class="form-group" v-bind:class="{ 'has-error': error && response.password }">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" v-model="password" required>
                                <span class="help-block" v-if="error && response.password">{{ response.password
                                    }}</span>
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
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
                name: null,
                email: null,
                password: null,
                success: false,
                error: false,
                response: null
            }
        },
        methods: {
            register(event) {
                event.preventDefault()
                auth.register(this, this.name, this.email, this.password)
            }
        }
    }
</script>