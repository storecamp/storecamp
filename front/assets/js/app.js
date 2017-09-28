/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


/**
 * system imports
 */
import VueRouter from 'vue-router';
import App from './components/App.vue';
import VueResource from 'vue-resource';
import {router} from './routes.js';
import VeeValidate from 'vee-validate';
import auth from './services/auth.service';

//components uses
Vue.use(VueRouter);
Vue.use(VueResource);
Vue.use(VeeValidate);
Vue.component('vue-pagination', require('./components/System/pagination.vue'));
Vue.component('vue-simple-pagination', require('./components/System/simple-pagination.vue'));
Vue.component('navigation', require('./components/Partials/Navigation.vue'));

//global headers set up
Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementsByName('csrf-token')[0].getAttribute('content');
Vue.http.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('id_token');
Vue.http.options.root = window.BASE_URL ? window.BASE_URL : 'http://skillhire.dev';
auth.authBefore();
// Exports
export default Vue;

require('./mixins/globalMixin');

const app = new Vue({
    el: '#app',
    router: router,
    render: app => app(App)
});

