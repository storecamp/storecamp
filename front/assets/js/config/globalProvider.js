import Vue from '../app.js';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
import VeeValidate from 'vee-validate';

//components uses
Vue.use(VueRouter);
Vue.use(VueResource);
Vue.use(VeeValidate);
Vue.component('vue-pagination', require('../components/System/pagination.vue'));
Vue.component('vue-simple-pagination', require('../components/System/simple-pagination.vue'));
Vue.component('navigation', require('../components/Partials/Navigation.vue'));
Vue.component('Sidebar', require('../components/Partials/Sidebar.vue'));
require('./globalHeaders');
