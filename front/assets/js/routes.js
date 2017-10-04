import VueRouter from 'vue-router';
import Dashboard from './components/Dashboard.vue';
import Signin from './components/Auth/Signin.vue';
import Profile from './components/User/Profile.vue';
import Skills from './components/User/Skills.vue';
import Contact from './components/User/Contacts.vue';
import Account from './components/User/Account.vue';
import AdditionalSettings from './components/User/AdditionalSettings.vue';
import PublicProfile from './components/User/PublicProfile.vue';
import All from "./components/Users/All.vue";
import UserEdit from "./components/Users/Edit.vue";
import UserCreate from "./components/Users/Create.vue";
import Logs from "./components/Logs/Logs.vue";
import LogsDash from "./components/Logs/Dashboard.vue";
import auth from './services/auth.service.js';

export let router = new VueRouter({
    routes: [
        {
            path: '/',
            name: 'dash',
            component: Dashboard
        },
        {
            path: '/signin',
            name: 'signin',
            component: Signin
        },
        {
            path: '/account',
            name: 'account',
            component: Account,
            props: { auth: auth },
            children: [
                {
                    path: 'profile',
                    name: 'profile',
                    component: Profile,
                    meta: { auth: true }
                },
                {
                    path: 'public-profile:userId',
                    name: 'public-profile',
                    component: PublicProfile,
                    meta: { auth: true }
                },
                {
                    path: 'skills',
                    name: 'skills',
                    component: Skills,
                    meta: { auth: true }
                },
                {
                    path: 'contact',
                    name: 'contact',
                    component: Contact,
                    meta: { auth: true }
                },
                {
                    path: 'additional_settings',
                    name: 'additional_settings',
                    component: AdditionalSettings,
                    meta: { auth: true }
                },
            ]
        },
        {
            path: '/users',
            name: 'users',
            component: All,
            props: { auth: auth },
            meta: { auth: true }
        },
        {
            path: '/users/edit/:id',
            name: 'usersEdit',
            component: UserEdit,
            props: { auth: auth },
            meta: { auth: true }
        },
        {
            path: '/users/create',
            name: 'usersCreate',
            component: UserCreate,
            props: { auth: auth },
            meta: { auth: true }
        },
        {
            path: '/logs',
            name: 'logs',
            component: Logs,
            props: { auth: auth },
            meta: { auth: true }
        },
        {
            path: '/logs_dash',
            name: 'logsDash',
            component: LogsDash,
            props: { auth: auth },
            meta: { auth: true }
        }
    ]
});
