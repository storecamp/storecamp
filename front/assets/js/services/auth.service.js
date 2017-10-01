import Vue from '../app.js';
import {router} from '../routes.js';

export default {
    options: {
        redirectIfLoggedInPath: '/dash',
        redirectIfNotLoggedInPath: '/signin'
    },
    user: {
        authenticated: false,
        profile: null,
        roles: []
    },
    authBefore() {
        var _this = this;
        router.beforeEach(function (to, from, next) {
            let token = localStorage.getItem('id_token');
            var vue = Vue;
            if (token !== null) {
                Vue.http.get(
                    'api/user?token=' + token,
                ).then(response => {
                    _this.beforeHandler(response, to, from, next);
                }, (error) => {
                    localStorage.removeItem('id_token');
                    localStorage.removeItem('client');
                    next({
                        path: this.redirectIfNotLoggedInPath
                    })
                });
            } else {
                if (to.matched.some(record => record.meta.auth)) {
                    localStorage.removeItem('id_token');
                    localStorage.removeItem('client');
                    next({
                        path: this.redirectIfNotLoggedInPath
                    });
                } else {
                    next()
                }
            }
        })
    },
    beforeHandler(response, to, from, next) {
        var user = {authenticated: false};
        user.authenticated = true;
        user.profile = response.data.data;
        user.roles = response.data.data.roles;
        if (to.matched.some(record => record.meta.auth)) {
            // this route requires auth, check if logged in
            // if not, redirect to login page.
            if (!user.authenticated) {
                next({
                    path: this.redirectIfNotLoggedInPath
                });
            } else {
                if ((user.roles.display_name == 'admin') && to.matched.some(record => record.meta.isAdmin)) {
                    next();
                } else {
                    if (to.matched.some(record => record.meta.isAdmin)) {
                        next({
                            path: this.redirectIfLoggedInPath
                        });
                    } else {
                        next();
                    }
                }
            }
        } else {
            next(); // make sure to always call next()!
        }
    },
    check() {
        let token = localStorage.getItem('id_token');
        var vue = Vue;
        if (token !== null) {
            Vue.http.get(
                'api/user?token=' + token,
            ).then(response => {
                this.user.authenticated = true;
                this.user.profile = response.data.data;
                this.user.roles = response.data.data.roles;
                localStorage.setItem('client', response.data.data.name);
            })
        }
    },
    register(context, name, email, password) {
        Vue.http.post(
            'api/register',
            {
                name: name,
                email: email,
                password: password
            }
        ).then(response => {
            context.success = true
        }, response => {
            localStorage.removeItem('id_token');
            localStorage.removeItem('client');
            context.response = response.data;
            context.error = true;
        })
    },
    signin(context, email, password) {
        Vue.http.post(
            'api/signin',
            {
                email: email,
                password: password
            }
        ).then(response => {
            context.error = false;
            localStorage.setItem('id_token', response.data.meta.token);
            localStorage.setItem('client', response.data.meta.name);
            Vue.http.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('id_token');
            this.user.authenticated = true;
            this.user.profile = response.data.data;
            router.push(this.redirectIfLoggedInPath);
        }, response => {
            localStorage.removeItem('id_token');
            localStorage.removeItem('client');
            context.error = true
        })
    },
    signout() {
        localStorage.removeItem('id_token');
        localStorage.removeItem('client');
        this.user.authenticated = false;
        this.user.profile = null;

        router.push({
            name: this.redirectIfLoggedInPath
        })
    },
    loggedIn() {
        return this.user.authenticated;
    }
}