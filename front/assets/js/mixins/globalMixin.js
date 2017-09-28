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
        toggleVisibility: toggleVisibility
    }
});
