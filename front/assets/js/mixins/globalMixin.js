import Vue from '../app.js';
import {toggleVisibility} from './toggleVisibility';
const eventHub = new Vue(); // Single event hub
Vue.mixin({
    data: function () {
        return {
            eventHub: eventHub
        }
    },
    methods: {
        formatBytes(bytes, precision = 2) {
            let sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            if (bytes == 0) return '0 Byte';
            let i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));

            return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
        },
        toggleVisibility: toggleVisibility
    }
});
