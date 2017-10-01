/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
window.Vue = require('vue');
/**
 * system imports
 */
import App from './components/App.vue';
import {router} from './routes.js';
import auth from './services/auth.service';

//before interceptor
auth.authBefore();

// Export App
export default Vue;

//setup global vue dependencies
require('./config/globalProvider');

//globalData mixin
require('./mixins/globalMixin');

//app vue instance set up
const app = new Vue({
    el: '#app',
    router: router,
    render: app => app(App)
});

