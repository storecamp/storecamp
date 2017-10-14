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
import LogshowDateKey from "./components/Logs/LogshowDateKey.vue";
import LogshowDate from "./components/Logs/LogshowDate.vue";
import AccessAll from "./components/Access/All.vue";
import AccessCreate from "./components/Access/Create.vue";
import AccessEdit from "./components/Access/Edit.vue";
import AllMedia from "./components/FileSystem/All.vue";

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
            path: '/access',
            name: 'access',
            component: AccessAll,
            props: { auth: auth },
            meta: { auth: true }
        },
        {
            path: '/access/edit/:id',
            name: 'rolesEdit',
            component: AccessEdit,
            props: { auth: auth },
            meta: { auth: true }
        },
        {
            path: '/access/create',
            name: 'rolesCreate',
            component: AccessCreate,
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
        },
        {
            path: '/logs_date/:date',
            name: 'logsShowDate',
            component: LogshowDate,
            props: { auth: auth },
            meta: { auth: true }
        },
        {
            path: '/logs_date_key/:date/:key',
            name: 'logsShowDateKey',
            component: LogshowDateKey,
            props: { auth: auth },
            meta: { auth: true }
        },
        {
            path: '/media',
            name: 'media',
            component: AllMedia,
            props: { auth: auth },
            meta: { auth: true }
        },
        {
            path: '/media_disk/:disk',
            name: 'mediaDisk',
            component: AllMedia,
            props: { auth: auth },
            meta: { auth: true }
        },
        {
            path: '/media_disk_folder/:disk/:folder_id',
            name: 'mediaDiskFolder',
            component: AllMedia,
            props: { auth: auth },
            meta: { auth: true }
        }
    ]
});
